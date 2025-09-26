<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth, Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('admin_logout');
    }

    public function custom_login_page(){

        $has_super_admin = Admin::exists();

        return view('admin.auth.login', [
            'has_super_admin' => $has_super_admin
        ]);
    }

    public function store_login(Request $request){

        $rules = [
            'email' => 'required',
            'password' => 'required',
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

        $admin = Admin::where('email', $request->email)->first();
        if($admin){
            if($admin->status == $admin::STATUS_ACTIVE){
                if(Hash::check($request->password, $admin->password)){
                    if(Auth::guard('admin')->attempt($credentials, $request->remember)){
                        $notify_message = ['message' => 'Inicio de sesión exitoso. ¡Bienvenido!', 'alert-type' => 'success'];
                        return redirect()->route('admin.dashboard')->with($notify_message);
                    }
                }else{
                    $notify_message = ['message' => 'Las credenciales no coinciden. Inténtalo de nuevo.', 'alert-type' => 'error'];
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

    public function store_register(Request $request){

        $has_super_admin = Admin::exists();

        if($has_super_admin){
            $notify_message = ['message' => 'El super administrador ya existe.', 'alert-type' => 'error'];
            return redirect()->back()->with($notify_message);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100']

        ],[
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
        ]);

        $super_admin = new Admin();
        $super_admin->name = $request->name;
        $super_admin->email = $request->email;
        $super_admin->status = 'enable';
        $super_admin->admin_type = 'super_admin';
        $super_admin->password = Hash::make($request->password);
        $super_admin->save();

        Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);

        $notify_message = ['message' => 'Super administrador creado exitosamente.', 'alert-type' => 'success'];
        return redirect()->route('admin.dashboard')->with($notify_message);
    }

    public function admin_logout(){
        Auth::guard('admin')->logout();

        $notify_message = ['message' => 'Has cerrado sesión correctamente.', 'alert-type' => 'success'];
        return redirect()->route('admin.login')->with($notify_message);
    }
}
