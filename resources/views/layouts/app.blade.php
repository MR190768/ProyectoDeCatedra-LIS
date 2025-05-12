<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.header')

</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    @yield('content')
        @include('layouts.chat') 
    <footer>
        @include('layouts.footer')
    </footer>

</body>

</html>