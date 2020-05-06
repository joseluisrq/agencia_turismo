<!--Extendemos de la plantilla principal-->
@extends('principal')
<!--INICIA EL CONTENIDO-->
@section('contenido') 

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
<template v-if=menu==5>
    <empleado :ruta="ruta" ></empleado>    
</template>




@endsection
<!--FIN DEL CONTENIDO-->