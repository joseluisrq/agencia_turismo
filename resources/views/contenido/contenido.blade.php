<!--Extendemos de la plantilla principal-->
@extends('principal')
<!--INICIA EL CONTENIDO-->
@section('contenido') 


@if(Auth::check()) <!--si el usuario esta autentificado-->
    @if (Auth::user()->idrol == 1)
        <!--DASBOARD-->
        <template v-if=menu==0>
            <h1>Paquetes Turisticos</h1>
        </template>

        <!--servicios-->
        <template v-if=menu==1>
            <servicio :ruta="ruta" ></servicio>
        </template>

        <template v-if=menu==2>
            <categoria :ruta="ruta" ></categoria>
        </template>

        <!--Personas-->
        <template v-if=menu==3>
            <prestador :ruta="ruta" ></prestador>
        </template>

        <template v-if=menu==4>
            <cliente :ruta="ruta" ></cliente>
        </template>
        <!--Empleados-->
        <template v-if=menu==5>
            <empleado :ruta="ruta" ></empleado>    
        </template>

        <template v-if=menu==7>
            <cargo :ruta="ruta" ></cargo>    
        </template>

        <!--Uusario-->
        <template v-if=menu==6>
            <rol :ruta="ruta" ></rol>    
        </template>
        
        <template v-if=menu==8>
            <usuario :ruta="ruta" ></usuario>    
        </template>

    @elseif (Auth::user()->idrol == 2)
    
    @elseif (Auth::user()->idrol == 3)
    
    @else

    @endif

@endif

@endsection
<!--FIN DEL CONTENIDO-->