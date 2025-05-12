<!-- Header Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 bg-secondary d-none d-lg-block">
            <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 display-4 text-primary text-uppercase">Acorpe</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row bg-white border-bottom d-none d-lg-flex">
                <div class="col-lg-7 text-left">
                    <div class="h-100 d-inline-flex align-items-center py-2 px-3">
                        <i class="fa fa-envelope text-primary mr-2"></i>
                        <small>contacto@acorpe.com</small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2 px-2">
                        <i class="fa fa-phone-alt text-primary mr-2"></i>
                        <small>+503 2222-3333</small>
                    </div>
                </div>
                <div class="col-lg-5 text-right">
                    <div class="d-inline-flex align-items-center p-2">
                        <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="https://www.facebook.com/ACORPELEGAL/?locale=es_LA" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-primary btn-sm-square mr-2" href="https://www.tiktok.com/@acorpe.sv" target="_blank">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary text-uppercase">Acorpe</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('inicio')}}" class="nav-item nav-link">Inicio</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">Nosotros</a>
                        <a href="{{route('repositorio')}}" class="nav-item nav-link">Repositorio</a>
                        <a href="{{route('contacto')}}" class="nav-item nav-link">Contacto</a>
                    </div>
                    <div class="ml-auto">
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->nombres }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    @if (Auth::user()->tipo_usuario === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Panel Admin</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('perfil') }}">Ver Perfil</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary mr-2">Iniciar Sesión</a>
                            <a href="{{ route('registro') }}" class="btn btn-primary">Registrarse</a>
                        @endauth
                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
