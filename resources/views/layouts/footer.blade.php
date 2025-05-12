    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white pt-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 mt-n2 display-4 text-primary text-uppercase">Acorpe</h1>
                </a>
                <p class="mt-3">Expertos legales comprometidos con la excelencia y la justicia.</p>
                <div class="d-flex justify-content-start mt-4">
                    <!-- Facebook -->
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2"
                        href="https://www.facebook.com/ACORPELEGAL/?locale=es_LA"
                        target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <!-- TikTok -->
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2"
                        href="https://www.tiktok.com/@acorpe.sv"
                        target="_blank">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">Enlaces Rápidos</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="{{route('inicio')}}"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                    <a class="text-white mb-2" href="{{route('about')}}"><i class="fa fa-angle-right mr-2"></i>Nosotros</a>
                    <a class="text-white mb-2" href="{{route('repositorio')}}"><i class="fa fa-angle-right mr-2"></i>Repositorio</a>
                    <a class="text-white" href="{{route('contacto')}}"><i class="fa fa-angle-right mr-2"></i>Contacto</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-semi-bold text-primary mb-4">Contacto</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Soyapango, San Salvador, El Salvador</p>
                <p><i class="fa fa-envelope mr-2"></i>contacto@acorpe.com</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+503 2222-3333</p>
            </div>
        </div>
        <div class="row p-4 mt-4 mx-0" style="background: rgba(256, 256, 256, .05);">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a class="font-weight-bold" href="#">Acorpe</a>. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    @vite('resources/lib/easing/easing.min.js')
    @vite('resources/lib/waypoints/waypoints.min.js')
    @vite('resources/lib/owlcarousel/owl.carousel.min.js')
    @vite('resources/js/main.js')
