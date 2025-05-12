<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function store(Request $request)
  {
    // Validar los datos del formulario
    $validator = Validator::make($request->all(), [
      'nombres' => 'required|string|max:255',
      'apellidos' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
    ]);

    // Si falla la validación, redirigir con los errores
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    // Verificar si ya existe un usuario con el mismo email (esto es para el flujo normal)
    $user = User::where('email', $request->email)->first();

    // Si no existe, creamos el nuevo usuario
    if (!$user) {
      $user = User::create([
        'nombres' => $request->nombres,
        'apellidos' => $request->apellidos,
        'email' => $request->email,
        'contrasena' => Hash::make($request->password), // Asegúrate de que sea una contraseña hash
        'tipo_usuario' => 'usuario',  // Por defecto 'usuario', o puedes cambiarlo si es admin
      ]);

      // Iniciar sesión automáticamente después del registro
      auth()->login($user);

      // Redirigir a la página de inicio (o a donde prefieras)
      return redirect()->route('inicio')->with('success', 'Registro exitoso y sesión iniciada.');
    }

    // Si ya existe el usuario, redirige con mensaje
    return redirect()->route('login')->with('error', 'Ya existe una cuenta con ese correo electrónico.');
  }
}
