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
      $googleUser = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
        ->user();

      // Buscar o crear el usuario en la base de datos
      $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()], // Buscar por correo
        [
          'name' => $googleUser->getName(),
          'google_id' => $googleUser->getId(), // Guarda el ID de Google
          'password' => bcrypt('google'), // Contraseña mock
        ]
      );

      // Iniciar sesión al usuario
      Auth::login($user);

      // Redirigir al dashboard
      return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso con Google.');
    } catch (\Exception $e) {
      return redirect()->route('register')->with('error', 'Hubo un problema al iniciar sesión con Google.');
    }
  }
}