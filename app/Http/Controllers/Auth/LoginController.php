<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    // Validar los datos del formulario
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
      return redirect()->route('contacto')->with('success', 'Inicio de sesión exitoso.');
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