<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Panel')</title>
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar') 

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                {{-- Aquí va el contenido de cada vista --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto text-center">
                    <span>Copyright © Tu Sistema 2025</span>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
