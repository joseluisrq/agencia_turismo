<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Usuarios
                                <small>Campíña  Panel administrador</small>
                            </h3>
                        </div>
                           <button class="btn btn-warning text-white"  @click="abrirModal('usuarios','registrar')"> 
                                                      Nuevo Usuario
                                                 </button> 
                    </div>                  
                </div>
            </div>
        </div>
    <!-- fin container inicio-->
    <!--contenido-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                      
                        
                        <div class="card-body">                           
                           
                                                        
                           
                            <!--tabla de lista de categorias-->
                             <div class="table-responsive col-md-12 mt-4">
                                <table class="table table-responsive table-bordered ">
                                    <thead class="">
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Opciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="usuario in arrayUsuarios" :key="usuario.id">
                                            <td v-text="usuario.iduser"> </td>
                                            <td  v-text="usuario.usuario"></td>
                                            <td  v-text="usuario.rol"></td>
                                            <!--usuarioegoria activa o desactivada-->
                                             <td v-if="usuario.condicionusuario==1">
                                               <span class="text-success" >Activo</span>  
                                             </td>
                                             <td v-else-if="usuario.condicionusuario==0">
                                                <span class="text-danger" >Desactivado</span> 
                                             </td>

                                              <td  v-text="usuario.usernombre+' '+usuario.userapellido"></td>
                                            <!--fin cargoegoria activa o desactivada-->

                                             <!--opciones de detalle cargoegoria-->
                                             <td v-if="usuario.condicionusuario==0">
                                                 <button class="btn btn-success" @click="btnActivar(usuario.iduser)"> 
                                                     <i class="far fa-check-circle"></i>  
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="usuario.condicionusuario==1">
                                                 <button class="btn btn-warning text-white"  @click="abrirModal('usuarios','actualizar',usuario)"> 
                                                       <i class="fas fa-edit"></i>
                                                 </button> 
                                                 <button class="btn btn-primary" @click="btnDesactivar(usuario.iduser)"> 
                                                       <i class="fas fa-minus-circle"></i>
                                                 </button>      
                                             </td>
                                              <!--fin opciones de detalle categoria-->
                                        </tr>                                               
                                    </tbody>
                                </table>
                                <!--paginacion-->
                            
                                 <!--fin de paginacion-->
                            </div>
                            <!--fin tabla lista de categorias-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--fin contenido-->


    <!--MODAL INSERTAR O ACTUALIZAR -->
        <div class="modal "  :class="{'mostrar' : modal}"  aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content" >                    
                        <!-- Modal Header -->
                        <div class="" style="background-color: #ff8084 !important">
                            <h4 class="text-center  mt-2 text-white" > 
                                <button type="button" class="close text-white"  @click="cerrarModal()" data-dismiss="modal">
                                    <i class="far fa-times-circle"></i>  &nbsp;
                                 </button>
                                {{tituloModal}} 
                            </h4>      
                        </div>                        
                    <!-- Modal body -->
                        <div class="modal-body card">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class=" form-control-label" for="text-input">Nombre (*)</label>
                                        <input type="text" v-model="nombre_usuario" class="form-control" placeholder="Ingrese usuario">                                              
                                    </div>
                                     <div class="col-md-12 form-group">
                                        <label class=" form-control-label" for="text-input">Constraseña (*)</label>
                                        <input type="password" v-model="pass_uno" class="form-control" placeholder="Ingrese contraseña">                                              
                                    </div>
                                     <div class="col-md-12 form-group">
                                        <label class=" form-control-label" for="text-input">Repita Contraseña(*)</label>
                                        <input type="password" v-model="pass_dos" class="form-control" placeholder="Repita contraseña">                                              
                                    </div>
                                  
                                     <div class="col-md-12 form-group">
                                        <label class=" form-control-label" for="text-input">Rol (*)</label>
                                        <select class=" form-control" v-model="rol_user">
                                            <option value="0" disabled>Selecione rol</option>
                                                <option v-for="rol in arrayRoles" :key="rol.id" :value="rol.id" v-text="rol.nombre"></option>
                                        </select>
                                        
                                    </div>      
                                     <div class="col-md-12 form-group">
                                        <label class=" form-control-label" for="text-input">Empleado (*)</label>
                                        <select class=" form-control" v-model="empleado_user">
                                            <option value="0" disabled>Selecione empleado</option>
                                                <option v-for="empleado in arrayEmpleados" :key="empleado.id" :value="empleado.id" v-text="empleado.nombres"></option>
                                        </select>
                                        
                                    </div>      
                                </div>
                                <div v-show="errorCargo" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCargo" :key="error" v-text="error">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary col-md-12" @click="btnAgregar()"><i class="far fa-save"></i> Guardar</button>
                                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary col-md-12" @click="actualizarCategoria()"><i class="fas fa-redo"></i> Actualizar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary col-md-12" @click="cerrarModal()"><i class="far fa-times-circle"></i> Cancelar</button>
                                    </div>
                                </div>
                            </form>     
                        </div>                        
                    </div>
            </div>
        </div>
         <!--FIN MODAL INSERTAR O ACTUALIZAR -->
</main>

</template>

<script>

    export default {
        props : ['ruta'],
        data(){
            return{
                id_usuario:0,
                nombre:'',
                rol_user:0,
                arrayUsuarios:[],
                 arrayRoles:[],
                 arrayEmpleados:[],
                 empleado_user:'',
                 pass_uno:'',
                 pass_dos:'',
                 

                nombre_usuario:'',

                //modal
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCargo : 0,
                errorMostrarMsjCargo : [],

                }                
        },
         computed:
        {
              
        },
        methods:{
         
           
            listarUsuarios(){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/list_user';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayUsuarios = respuesta.usuarios;
                  
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            btnAgregar(){
                  if (this.validarCargo()){
                    return;
                }                
                let me = this;
                axios.post(me.ruta+'/cargo/registrar',{
                    'nombre': this.nombre_usuario,
                    'rol_user': this.rol_user

                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Cargo registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarUsuarios();
                }).catch(function (error) {
                    console.log(error);
                });
              
            },
            actualizarCategoria(){
                if (this.validarCargo()){
                    return;
                }
                
                let me = this;

                 axios.put(me.ruta+'/cargo/actualizar',{                  
                    'nombre': this.nombre_usuario,
                    'rol_user': this.rol_user,              
                    'id': this.id_usuario
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarUsuarios();
                }).catch(function (error) {
                    console.log(error);
                }); 
                
            },
            validarCargo(){
                this.errorCargo=0;
                this.errorMostrarMsjCargo =[];

                if (!this.nombre_usuario) this.errorMostrarMsjCargo.push("El nombre del cargo no puede estar vacío.");
                if (!this.rol_user) this.errorMostrarMsjCargo.push("La descripción no puede estar vacío.");             
                if (this.errorMostrarMsjCargo.length) this.errorCargo = 1;

                return this.errorCargo;
            },
            btnActivar(iduser){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar el usuario?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/usuario/activar',{
                    'id': iduser
                    }).then(function(response){
                        me.listarUsuarios();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'El usuario se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(iduser){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar el usuario?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/usuario/desactivar',{
                    'id': iduser
                    }).then(function(response){
                        me.listarUsuarios();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'El usuario se ha desactivado con éxito',
                    'success'
                    )
                }
                })
            },
              cerrarModal(){
                this.modal=0;
                this.nombre_usuario='';
                this.rol_user='';  
            },
             selectRol(){
                let me=this;
                me.vistaUsuario=true;
                var url= me.ruta+'/rol/selectRol';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayRoles = respuesta.roles;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
              selectEmpleado(){
                let me=this;
                me.vistaUsuario=true;
                var url= me.ruta+'/empleado/selectEmpleado';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayEmpleados = respuesta.empleados;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "usuarios":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Usuario';
                                this.selectRol();
this.selectEmpleado();
                                this.nombre_usuario='';
                                this.rol_user='';                              
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.selectRol();
                             //     this.selectEmpleado();
                                this.modal=1;
                                this.tituloModal='Actualizar Usuario';
                                this.tipoAccion=2;
                                this.id_usuario=data['iduser'];
                                this.nombre_usuario = data['usuario'];
                                this.rol_user = data['idrol'];                              
                                break;
                            }
                        }
                    }
                }
            },
        },
        mounted() {
             this.listarUsuarios();
        }
    }
</script>
<style>    
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 500px;
   
    overflow-y: auto;
}

    
   .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
       
        display: list-item !important;
        opacity: 1 !important;
        position: fixed !important;
        background-color: #3c29297a !important;
  

    }   
 
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color:#ff8084 !important;
        font-weight: bold;
    }
</style>
