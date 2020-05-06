<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/imagenes/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/imagenes/logo.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Campiña Tours</title>


     <!-- Iconos-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">      
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
     <!--fin iconos-->

   <!-- CSS COMPILADO CON LARAVEL MIX-->
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">

</head>

<body>
<!--Abrimos id app que -->
<div id="app">


<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- cabecera-->
    <div class="page-main-header">
        <div class="main-header-right row">

            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper">
                    <a href="index.html">
                        <img class="blur-up lazyloaded" src="assets/imagenes/logo.png" alt="">
                     </a>
                </div>
            </div>
            <!--toggle ocultar-->
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch">
                        <a href="#">
                            <i id="sidebar-toggle" data-feather="align-left"></i>
                        </a>
                    </label>
                </div>
            </div>
            <!--fin togle ocultar-->

            <!--navegacion de cabera-->
            <div class="nav-right col">               
            </div>
            <!--fin de navegacion de cabecera-->
        </div>
    </div>
    <!--fin de cabecera -->

   <!--Menu horizontal-->
    <div class="page-body-wrapper">      
         @include('plantilla/menu')    
    </div>
    <!--fin menu horizontal-->
  
    <!--Contenido-->
    <div class="page-body">     
        @yield('contenido')               
    </div>
    <!--Fin contenido-->

    <!--Footer-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 footer-copyright">
                    <p class="mb-0">Copyright 2020 © CampiñaTours - Todos los derechos Reservados</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right mb-0">Jose Luis Ramirez<i class="fa fa-heart"></i></p>
                </div>
            </div>
        </div>
    </footer>
    <!--Fin footer-->

    </div>         
</div>
</div>


<!-- JS COMPILADO CON LARAVEL MIX-->



<script src="js/app.js"></script>
<script src="js/plantilla.js"></script>




</body>
</html>
