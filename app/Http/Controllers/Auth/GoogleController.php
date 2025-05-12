<?php

/*
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->user();

        // Buscar si ya existe el usuario
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Crear nuevo usuario con los campos requeridos
            $user = new User();
            $user->nombres = $googleUser->user['given_name'] ?? $googleUser->getName();
            $user->apellidos = $googleUser->user['family_name'] ?? '-';
            $user->email = $googleUser->getEmail();
            $user->google_id = $googleUser->getId();
            $user->contrasena = bcrypt('google'); // contraseña dummy
            $user->tipo_usuario = 'usuario'; // si es obligatorio
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('repositorio')->with('success', 'Inicio de sesión exitoso con Google.');

    } catch (\Exception $e) {
        \Log::error('Google login error: ' . $e->getMessage());
        return redirect()->route('login')->with('error', 'Hubo un problema al iniciar sesión con Google.');
    }
}

}

*/