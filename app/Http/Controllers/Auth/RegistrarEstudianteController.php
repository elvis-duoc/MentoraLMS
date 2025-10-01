<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrarEstudianteController extends Controller
{
    // Mostrar el formulario de registro
    public function showManualRegisterForm()
    {
        return view('student.manual_register');
    }

    // Guardar estudiante
    public function storeManualRegister(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20', // puedes ajustar el formato si quieres
            'password' => 'required|string|min:6|confirmed', // requiere campo password_confirmation
        ]);

        // Crear usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => User::STATUS_ACTIVE,
            'is_banned' => User::BANNED_INACTIVE,
            'email_verified_at' => now(), // <--- Esto hace que no sea necesario verificar por email
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('student.dashboard')->with('success', 'Estudiante registrado correctamente.');
    }
}
