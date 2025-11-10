<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Mail, Str;
use App\Models\User;
use App\Rules\Captcha;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use App\Mail\UserRegistration;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\EmailSetting\App\Models\EmailTemplate;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function custom_register_page(){

        $breadcrumb_title = trans('translate.Sign Up');

        return view('auth.register', [
            'breadcrumb_title' => $breadcrumb_title
        ]);
    }


    public function store_register(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=>new Captcha()

        ],[
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.unique' => 'El correo electrónico ya existe',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'La confirmación de contraseña no coincide',
            'password.min' => 'Debes proporcionar una contraseña de al menos 4 caracteres',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => Str::slug($request->name).'-'.date('Ymdhis'),
            'status' => 'enable',
            'is_banned' => 'no',
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(100),
        ]);

        EmailHelper::mail_setup();

        $verification_link = route('student.register-verification').'?verification_link='.$user->verification_token.'&email='.$user->email;
        $verification_link = '<a href="'.$verification_link.'">'.$verification_link.'</a>';

        try{
            $template=EmailTemplate::where('id',4)->first();
            $subject=$template->subject;
            $message=$template->description;
            $message = str_replace('{{user_name}}',$request->name,$message);
            $message = str_replace('{{varification_link}}',$verification_link,$message);

            Mail::to($user->email)->send(new UserRegistration($message,$subject,$user));
        }catch(Exception $ex){
            Log::info('Register mail : '. $ex->getMessage());
        }


        $notify_message = 'Cuenta creada exitosamente, se ha enviado un enlace de verificación a tu correo, por favor verifícalo';
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function register_verification(Request $request){
        $user = User::where('verification_token',$request->verification_link)->where('email', $request->email)->first();
        if($user){

            if($user->email_verified_at != null){

                $notify_message = 'El correo electrónico ya ha sido verificado';
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->route('student.login')->with($notify_message);
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_token = null;
            $user->save();

            $notify_message = 'Verificación exitosa';
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->route('student.login')->with($notify_message);
        }else{

            $notify_message = 'Token o correo electrónico inválido';
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('student.login')->with($notify_message);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
