<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Acorpe - Registro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Registro Legal, Crear Cuenta" name="keywords">
    <meta content="Cree su cuenta para acceder al repositorio legal exclusivo" name="description">

@include('layouts.header')

    <style>
        .register-container {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .register-image {
            background: linear-gradient(rgba(15, 23, 43, 0.7), rgba(15, 23, 43, 0.7)),
                        url('img/feature.jpg') center center no-repeat;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .register-form {
            backdrop-filter: blur(10px);
            animation: slideInRight 0.5s ease;
        }
        
        .progress-bar {
            height: 5px;
            background: #e9ecef;
            margin-bottom: 2rem;
        }
        
        .progress-bar .progress {
            width: 33%;
            height: 100%;
            background: #1d4ed8;
            transition: width 0.3s ease;
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>

    <!-- Register Container Start -->
    <div class="container-fluid register-container">
        <div class="row align-items-center">
            <!-- Imagen Decorativa -->
            <div class="col-lg-6 d-none d-lg-block register-image">
            </div>
            <!-- Formulario Registro -->
            <div class="col-lg-6">
                <div class="register-form p-5">
                    <div class="text-center mb-5">
                        <h2 class="text-primary mb-3">Crear Cuenta</h2>
                        <p>Complete los siguientes campos para registrarse</p>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    </div>

                    <form>
                        <!-- Nombre Completo -->
                        <div class="form-group mb-4">
                            <label class="form-label text-primary"><i class="fas fa-user-tie mr-2"></i>Nombre Completo</label>
                            <input type="text" class="form-control form-input py-3" placeholder="Ej: Juan Pérez" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label class="form-label text-primary"><i class="fas fa-envelope mr-2"></i>Correo Electrónico</label>
                            <input type="email" class="form-control form-input py-3" placeholder="nombre@ejemplo.com" required>
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group mb-4">
                            <label class="form-label text-primary"><i class="fas fa-lock mr-2"></i>Contraseña</label>
                            <input type="password" class="form-control form-input py-3" placeholder="••••••••" required>
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="form-group mb-4">
                            <label class="form-label text-primary"><i class="fas fa-lock mr-2"></i>Confirmar Contraseña</label>
                            <input type="password" class="form-control form-input py-3" placeholder="••••••••" required>
                        </div>

                        <!-- Términos -->
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms">
                                <label class="form-check-label text-muted" for="terms">
                                    Acepto los <a href="#" class="text-primary">Términos y Condiciones</a>
                                </label>
                            </div>
                        </div>

                        <!-- Botón Registro -->
                        <button type="submit" class="btn btn-primary btn-block py-3 mb-4">
                            <i class="fas fa-user-plus mr-2"></i>Registrarse
                        </button>

                        <!-- Divisor -->
                        <div class="divider d-flex align-items-center mb-4">
                            <p class="text-center text-muted mx-3 mb-0">Registro Rápido</p>
                        </div>

                        <!-- Social Register -->
                        <div class="social-login text-center">
                            <a href="#" class="btn btn-outline-primary btn-lg-square mx-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-lg-square mx-2">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>

                        <!-- Login -->
                        <div class="text-center mt-5">
                            <p class="text-muted">¿Ya tiene cuenta? <a href="{{route('login')}}" class="text-primary">Inicie Sesión aquí</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Container End -->

  <footer>
    @include('layouts.footer')
  </footer>


    <script>
        
        $(document).ready(function(){
            $('input').on('focus', function(){
                $('.progress').css('width', '66%');
            });
            
            $('input').on('blur', function(){
                $('.progress').css('width', '33%');
            });
            
            $('form').on('submit', function(){
                $('.progress').css('width', '100%');
            });
        });
    </script>
</body>
</html>