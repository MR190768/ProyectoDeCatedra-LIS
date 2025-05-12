<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Acorpe - Iniciar Sesión</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Acceso Legal, Login Abogados" name="keywords">
  <meta content="Acceso seguro al repositorio legal de Acorpe" name="description">

  @include('layouts.header')

  <style>
    .login-container {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .login-image {
      background: linear-gradient(rgba(15, 23, 43, 0.7), rgba(15, 23, 43, 0.7)),
        url('img/feature.jpg') center center no-repeat;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-form {
      backdrop-filter: blur(10px);
      animation: fadeInUp 0.5s ease;
    }

    .form-input {
      transition: all 0.3s ease;
      border: 2px solid #e9ecef;
    }

    .form-input:focus {
      border-color: #1d4ed8;
      box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.1);
    }

    .social-login .btn {
      transition: transform 0.3s ease;
    }

    .social-login .btn:hover {
      transform: translateY(-3px);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <!-- Login Container Start -->
  <div class="container-fluid login-container">
    <div class="row align-items-center">
      <!-- Imagen Decorativa -->
      <div class="col-lg-6 d-none d-lg-block login-image">
      </div>

      <!-- Formulario Login -->
      <div class="col-lg-6">
        <div class="login-form p-5">
          <div class="text-center mb-5">
            <h2 class="text-primary mb-3">Iniciar Sesión</h2>
            <p>Acceda a su cuenta para continuar</p>
          </div>


          <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <!-- Email -->
            <div class="form-group mb-4">
              <label class="form-label text-primary"><i class="fas fa-envelope mr-2"></i>Correo Electrónico</label>
              <input type="email" name="email" class="form-control form-input py-3" placeholder="nombre@ejemplo.com"
                value="{{ old('email') }}" required>
              @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
            </div>

            <!-- Contraseña -->
            <div class="form-group mb-4">
              <label class="form-label text-primary"><i class="fas fa-lock mr-2"></i>Contraseña</label>
              <input type="password" name="password" class="form-control form-input py-3" placeholder="••••••••"
                required>
              @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
            </div>

            <!-- Recuerdame -->
            <div class="d-flex justify-content-between mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-muted" for="remember">Recuérdame</label>
              </div>
            </div>

            <!-- Botón Login -->
            <button type="submit" class="btn btn-primary btn-block py-3 mb-4">
              <i class="fas fa-sign-in-alt mr-2"></i>Ingresar
            </button>
          </form>
          <a href="{{ route('auth.google') }}" class="btn btn-danger btn-block py-3 mb-4">
            <i class="fab fa-google mr-2"></i> Iniciar sesión con Google
          </a>
        </div>
      </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  </div>
  <!-- Login Container End -->
  <footer>
    @include('layouts.footer')
  </footer>
</body>

</html>