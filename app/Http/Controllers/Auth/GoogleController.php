<?php
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
      $googleUser = Socialite::driver('google')->user();

      // Buscar o crear el usuario
      $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
          'name' => $googleUser->getName(),
          'email' => $googleUser->getEmail(),
          'google_id' => $googleUser->getId(), // Guardar el ID de Google
          'password' => bcrypt('google'), // Contraseña
        ]
      );

      // Iniciar sesión al usuario
      Auth::login($user);

      return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso con Google.');
    } catch (\Exception $e) {
      return redirect()->route('login')->with('error', 'Hubo un problema al iniciar sesión con Google.');
    }
  }
}