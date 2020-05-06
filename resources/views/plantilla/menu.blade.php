
 
    <div class="page-sidebar">

        <!--Logo Menu-->
        <div class="main-header-left d-none d-lg-block">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="blur-up lazyloaded i " src="assets/imagenes/logo.png"  width="120px" alt="">
                </a>
            </div>
        </div>
        <!--fin menu logo-->


        <!--menu-->
        <div class="sidebar custom-scrollbar">           
            <ul class="sidebar-menu">
                <!--Dasboard-->
                <li @click="menu=0"><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Dashboard</span></a></li>
                
                <!--Paquetes turisticos-->
                <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Paquete</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li   @click="menu=11"><a href="#"><i class="fa fa-circle"></i>Nuevo Paquete</a></li>
                        <li   @click="menu=12"><a href="#"><i class="fa fa-circle"></i>Lista de Paquete</a></li>
                    </ul>
                </li>  

                 <!--Lista de Clientes-->
                <li><a class="sidebar-header" href=""><i class="fas fa-user-tie"></i><span>Personas</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li   @click="menu=4"><a href="#"><i class="fas fa-snowboarding"></i> Clientes</a></li>
                        <li   @click="menu=3"><a href="#"><i class="fas fa-user-tie"></i> Prestadores</a></li>
                        <li   @click="menu=5"><a href="#"><i class="fas fa-people-carry"></i> Empleados</a></li>
                    </ul>
                </li>      
                 <!--Lista de Clientes-->
                 <li><a class="sidebar-header" href=""><i class="fa fa-box-open"></i><span> Servicios</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li   @click="menu=1"><a href="#"><i class="fas fa-cubes"></i> Lista de servicios</a></li>
                        <li   @click="menu=2"><a href="#"><i class="fas fa-cube"></i> Categorias </a></li>
                      
                    </ul>
                </li>  
            </ul>
        </div>
        <!--menu-->
   


