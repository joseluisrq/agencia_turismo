@extends('auth.contenido')

@section('login')
    <!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="authentication-box">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-0 card-left">
                    <div class="card bg-primary" style="background-color: #F25252  !important">
                        
                           <img src="assets/imagenes/logo2.png" class="rounded mx-auto d-block" width="150px" alt="">
                        

                        <div class="single-item">
                            <div>
                                <div>
                                    <h4 class=" text-center mt-4">Bienvenido</h4>
                                    <p class="">Sistema de administracion y venta de paquetes turísticos de la empresa de turísmo Campiña Tours -Cajamarca</p>          </div>
                            </div>
                     
                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-0 card-center">
                    <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><span class="icon-user mr-2"></span>Inicio de Sesión</a>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                    <form class="form-horizontal auth-form">
                                        <div class="form-group">
                                            <input required="" name="" type="email" class="form-control" placeholder="Usuario" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <input required="" name="" type="password" class="form-control" placeholder="Contraseña">
                                        </div>
                                     
                                        <div class="form-button">
                                            <button class="btn btn-primary" type="submit">Ingresar</button>
                                        </div>
                                      
                                    </form>
                                </div>
                              

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
