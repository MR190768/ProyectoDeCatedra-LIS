<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    try {
      $googleUser = Socialite::driver('google')->user();

      // Buscar al usuario en la base de datos por el correo
      $user = User::where('email', $googleUser->getEmail())->first();

      if ($user) {
        // Si el usuario existe, iniciar sesión
        Auth::login($user);
        return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso con Google.');
      } else {
        // Si el usuario no existe, redirigir al registro o mostrar un error
        return redirect()->route('login')->with('error', 'No se encontró una cuenta asociada a este correo. Por favor, regístrate.');
      }
    } catch (\Exception $e) {
      return redirect()->route('login')->with('error', 'Hubo un problema al iniciar sesión con Google.');
    }
  }
  public function login(Request $request)
  {
    // Validar los datos del formulario
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
      return redirect()->route('inicio')->with('success', 'Inicio de sesión exitoso.');
    }

    // Si falla, redirige de vuelta con un mensaje de error
    return back()->withErrors([
      'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->withInput();
  }

  public function logout(Request $request)
  {
    // Cerrar sesión
    Auth::logout();

    // Redirigir al login
    return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
  }
}