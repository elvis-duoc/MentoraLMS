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
    use AuthenticatesUsers;

    protected $redirectTo = '/student/dashboard';

    public function __construct()
    {
        $this->middleware('guest:web')->except('student_logout');
    }

    public function custom_login_page(){
        $breadcrumb_title = 'Iniciar sesión';
        return view('auth.login', compact('breadcrumb_title'));
    }

    public function store_login(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
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
                        $notify_message = ['message' => 'Por favor, intenta iniciar sesión con tu red social vinculada.', 'alert-type' => 'error'];
                        return redirect()->back()->with($notify_message);
                    }
                    if(Hash::check($request->password, $user->password)){
                        if(Auth::guard('web')->attempt($credentials, $request->remember)){
                            $notify_message = ['message' => 'Inicio de sesión exitoso. ¡Bienvenido!', 'alert-type' => 'success'];
                            if($user->is_seller == 1){
                                return redirect()->route('instructor.dashboard')->with($notify_message);
                            }else{
                                return redirect()->route('student.dashboard')->with($notify_message);
                            }
                        }
                    }else{
                        $notify_message = ['message' => 'Las credenciales no coinciden. Inténtalo de nuevo.', 'alert-type' => 'error'];
                        return redirect()->back()->with($notify_message);
                    }
                }else{
                    $notify_message = ['message' => 'Debes verificar tu correo electrónico antes de iniciar sesión.', 'alert-type' => 'error'];
                    return redirect()->back()->with($notify_message);
                }
            }else{
                $notify_message = ['message' => 'Tu cuenta está inactiva. Contacta con el administrador.', 'alert-type' => 'error'];
                return redirect()->back()->with($notify_message);
            }
        }else{
            $notify_message = ['message' => 'El correo electrónico no está registrado.', 'alert-type' => 'error'];
            return redirect()->back()->with($notify_message);
        }
    }

    public function student_logout(){
        Auth::guard('web')->logout();
        $notify_message = ['message' => 'Has cerrado sesión correctamente.', 'alert-type' => 'success'];
        return redirect()->route('student.login')->with($notify_message);
    }

    public function custom_forget_page(){
        $breadcrumb_title = 'Olvidé mi contraseña';
        return view('auth.forget_password', compact('breadcrumb_title'));
    }

    public function send_custom_forget_pass(Request $request){
        $rules = [
            'email' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => 'El correo electrónico es obligatorio.',
        ];

        $this->validate($request, $rules, $custom_error);

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
                Log::info('Error envío recuperación: '. $ex->getMessage());
            }

            $notify_message= ['message'=>'Se ha enviado un enlace de restablecimiento de contraseña a tu correo.', 'alert-type'=>'success'];
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = ['message' => 'El correo electrónico no está registrado.', 'alert-type' => 'error'];
            return redirect()->back()->with($notify_message);
        }
    }

    public function custom_reset_password(Request $request){
        $user = User::select('id','name','email','forget_password_token')
            ->where('forget_password_token', $request->token)
            ->where('email', $request->email)
            ->first();

        if(!$user){
            $notify_message = ['message'=>'Token inválido, inténtalo nuevamente.', 'alert-type'=>'error'];
            return redirect()->route('student.forget-password')->with($notify_message);
        }

        $breadcrumb_title = 'Restablecer contraseña';
        return view('auth.reset_password', compact('breadcrumb_title','user'));
    }

    public function store_reset_password(Request $request, $token){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=>new Captcha()
        ],[
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
        ]);

        $user = User::where('forget_password_token', $token)
            ->where('email', $request->email)
            ->first();

        if(!$user){
            $notify_message = ['message'=>'Token inválido, inténtalo nuevamente.', 'alert-type'=>'error'];
            return redirect()->back()->with($notify_message);
        }

        $user->password = Hash::make($request->password);
        $user->forget_password_token = null;
        $user->save();

        $notify_message= ['message'=>'Contraseña restablecida exitosamente. Ahora puedes iniciar sesión.', 'alert-type'=>'success'];
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

        $notify_message= ['message'=>'Inicio de sesión exitoso con Google.', 'alert-type'=>'success'];
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

        $notify_message= ['message'=>'Inicio de sesión exitoso con Facebook.', 'alert-type'=>'success'];
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
