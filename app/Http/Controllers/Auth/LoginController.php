<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Rules\Captcha;
use Auth, Hash, Str, Mail;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use App\Mail\UserForgetPassword;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/student/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('student_logout');
    }

    public function custom_login_page(){


        $breadcrumb_title = trans('translate.Sign In');

        return view('auth.login', [
            'breadcrumb_title' => $breadcrumb_title,
        ]);
    }

    public function store_login(Request $request){

        $rules = [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => trans('translate.Email is required'),
            'password.required' => trans('translate.Password is required'),
        ];

        $this->validate($request, $rules, $custom_error);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if($user){
            if($user->status == $user::STATUS_ACTIVE && $user->is_banned == $user::BANNED_INACTIVE){
                if($user->email_verified_at != null){
                    if($user->provider){
                        $notify_message = trans('translate.Please try to login with social media');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                        return redirect()->back()->with($notify_message);
                    }
                    if(Hash::check($request->password, $user->password)){
                        if(Auth::guard('web')->attempt($credentials, $request->remember)){

                            $notify_message = trans('translate.Login successfully');
                            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
                            if($user->is_seller == 1){
                                return redirect()->route('instructor.dashboard')->with($notify_message);
                            }else{
                                return redirect()->route('student.dashboard')->with($notify_message);
                            }

                        }
                    }else{
                        $notify_message = trans('translate.Credential does not match');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                        return redirect()->back()->with($notify_message);
                    }
                }else{
                    $notify_message = trans('translate.Please verify your email');
                    $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                    return redirect()->back()->with($notify_message);

                }

            }else{
                $notify_message = trans('translate.Inactive your account');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->back()->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Email not found');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }

    public function student_logout(){

        Auth::guard('web')->logout();

        $notify_message = trans('translate.Logout successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('student.login')->with($notify_message);

    }

    public function custom_forget_page(){

        $breadcrumb_title = trans('translate.Forget Password');

        return view('auth.forget_password',[
            'breadcrumb_title' => $breadcrumb_title
        ]);
    }

    public function send_custom_forget_pass(Request $request){

        $rules = [
            'email' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => trans('translate.Email is required'),
        ];

        $this->validate($request, $rules, $custom_error);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if($user){

            EmailHelper::mail_setup();

            $user->forget_password_token = Str::random(100);
            $user->save();

            $reset_link = route('student.reset-password').'?token='.$user->forget_password_token.'&email='.$user->email;
            $reset_link = '<a href="'.$reset_link.'">'.$reset_link.'</a>';

            try{
                $template = EmailTemplate::where('id',1)->first();
                $subject = $template->subject;
                $message = $template->description;
                $message = str_replace('{{user_name}}',$user->name,$message);
                $message = str_replace('{{reset_link}}',$reset_link,$message);
                Mail::to($user->email)->send(new UserForgetPassword($message,$subject,$user));
            }catch(Exception $ex){
                Log::info('Forget pass : '. $ex->getMessage());
            }


            $notify_message= trans('translate.A password reset link has been send to your mail');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('translate.Email not found');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

    }

    public function custom_reset_password(Request $request){

        $user = User::select('id','name','email','forget_password_token')->where('forget_password_token', $request->token)->where('email', $request->email)->first();


        if(!$user){
            $notify_message = trans('translate.Invalid token, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('student.forget-password')->with($notify_message);
        }

        $breadcrumb_title = trans('translate.Reset Password');

        return view('auth.reset_password', [
            'breadcrumb_title' => $breadcrumb_title,
            'user' => $user,
        ]);
    }

    public function store_reset_password(Request $request, $token){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=>new Captcha()

        ],[
            'email.required' => trans('translate.Email is required'),
            'email.unique' => trans('translate.Email already exist'),
            'password.required' => trans('translate.Password is required'),
            'password.confirmed' => trans('translate.Confirm password does not match'),
            'password.min' => trans('translate.You have to provide minimum 4 character password'),
        ]);


        $user = User::where('forget_password_token', $token)->where('email', $request->email)->first();

        if(!$user){
            $notify_message = trans('translate.Invalid token, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $user->password = Hash::make($request->password);
        $user->forget_password_token = null;
        $user->save();

        $notify_message= trans('translate.Password reset successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('student.login')->with($notify_message);
    }


    public function redirect_to_google(){

        $gmail_client_id = GlobalSetting::where('key', 'gmail_client_id')->first();
        $gmail_secret_id = GlobalSetting::where('key', 'gmail_secret_id')->first();
        $gmail_redirect_url = GlobalSetting::where('key', 'gmail_redirect_url')->first();


        \Config::set('services.google.client_id', $gmail_client_id->value);
        \Config::set('services.google.client_secret', $gmail_secret_id->value);
        \Config::set('services.google.redirect', $gmail_redirect_url->value);

        return Socialite::driver('google')->redirect();

    }

    public function google_callback(){

        $gmail_client_id = GlobalSetting::where('key', 'gmail_client_id')->first();
        $gmail_secret_id = GlobalSetting::where('key', 'gmail_secret_id')->first();
        $gmail_redirect_url = GlobalSetting::where('key', 'gmail_redirect_url')->first();


        \Config::set('services.google.client_id', $gmail_client_id->value);
        \Config::set('services.google.client_secret', $gmail_secret_id->value);
        \Config::set('services.google.redirect', $gmail_redirect_url->value);

        $user = Socialite::driver('google')->user();
        $user = $this->create_user($user,'google');

        auth()->login($user);

        $notify_message= trans('translate.Login Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        return redirect()->route('student.dashboard')->with($notify_message);

    }

    public function redirect_to_facebook(){

        $facebook_client_id = GlobalSetting::where('key', 'facebook_client_id')->first();
        $facebook_secret_id = GlobalSetting::where('key', 'facebook_secret_id')->first();
        $facebook_redirect_url = GlobalSetting::where('key', 'facebook_redirect_url')->first();

        \Config::set('services.facebook.client_id', $facebook_client_id->value);
        \Config::set('services.facebook.client_secret', $facebook_secret_id->value);
        \Config::set('services.facebook.redirect', $facebook_redirect_url->value);

        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback(){

        $facebook_client_id = GlobalSetting::where('key', 'facebook_client_id')->first();
        $facebook_secret_id = GlobalSetting::where('key', 'facebook_secret_id')->first();
        $facebook_redirect_url = GlobalSetting::where('key', 'facebook_redirect_url')->first();

        \Config::set('services.facebook.client_id', $facebook_client_id->value);
        \Config::set('services.facebook.client_secret', $facebook_secret_id->value);
        \Config::set('services.facebook.redirect', $facebook_redirect_url->value);

        $user = Socialite::driver('facebook')->user();
        $user = $this->create_user($user,'facebook');
        auth()->login($user);

        $notify_message= trans('translate.Login Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        return redirect()->route('student.dashboard')->with($notify_message);

    }

    public function create_user($get_info, $provider){
        $user = User::where('email', $get_info->email)->first();
        if (!$user) {

            $user = User::create([
                'name'     => $get_info->name,
                'username'     => Str::slug($get_info->name).'-'.date('Ymdhis'),
                'email'    => $get_info->email,
                'provider' => $provider,
                'provider_id' => $get_info->id,
                'status' => 'enable',
                'is_banned' => 'no',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'verification_token' => null,
            ]);

        }
        return $user;
    }



}
