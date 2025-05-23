<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
  // Método para redirigir al usuario a Google
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  // Método para manejar la devolución del login con Google
  public function handleGoogleCallback()
  {
    try {
      $googleUser = Socialite::driver('google')->user();

      // Buscar al usuario en la base de datos por el correo
      $user = User::where('email', $googleUser->getEmail())->first();

      if ($user) {
        $user->google_id = $googleUser->getId();
        $user->save();

        Auth::login($user);

        return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso con Google.');
      } else {
        // Si el usuario no existe, registrarlo con el Google ID
        $user = User::create([
          'nombres' => $googleUser->getName(),
          'apellidos' => '',
          'email' => $googleUser->getEmail(),
          'contrasena' => bcrypt(Str::random(16)),
          'google_id' => $googleUser->getId(),
          'tipo_usuario' => 'usuario',
        ]);

        Auth::login($user);

        return redirect()->route('inicio')->with('success', 'Registro exitoso con Google.');
      }
    } catch (\Exception $e) {
      return redirect()->route('login')->with('error', 'Hubo un problema al iniciar sesión con Google.');
    }
  }

  public function logout(Request $request)
  {
    // Cerrar sesión
    Auth::logout();

    // Redirigir al login
    return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'contrasena' => 'required|min:8',
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
      return back()->withErrors(['email' => 'El usuario no existe.'])->withInput();
    }

    if (!Hash::check($credentials['contrasena'], $user->contrasena)) {
      return back()->withErrors(['contrasena' => 'La contraseña es incorrecta.'])->withInput();
    }

    Auth::login($user);

    return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso.');
  }

}
