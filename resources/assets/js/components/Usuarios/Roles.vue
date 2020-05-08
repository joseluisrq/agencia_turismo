<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Roles
                                <small>Campíña  Panel administrador</small>
                            </h3>
                        </div>
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
                        <div class="card-header">
                            <h5>Lista Roles    
                                <button class="btn  btn-primary  pull-right"  @click="abrirModal('roles','registrar')">Registrar Rol</button>
                            </h5>                                                        
                        </div>
                        
                        <div class="card-body">                           
                           
                                                        
                           
                            <!--tabla de lista de categorias-->
                             <div class="table-responsive col-md-12 mt-4">
                                <table class="table table-responsive table-bordered ">
                                    <thead class="">
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Opciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="rls in arrayRol" :key="rls.id">
                                            <td v-text="rls.id"> </td>
                                            <td  v-text="rls.nombre"></td>
                                            <td  v-text="rls.descripcion"></td>
                                            <!--rlsegoria activa o desactivada-->
                                             <td v-if="rls.condicion==1">
                                               <span class="text-success" >Activo</span>  
                                             </td>
                                             <td v-else-if="rls.condicion==0">
                                                <span class="text-danger" >Desactivado</span> 
                                             </td>
                                            <!--fin rlsegoria activa o desactivada-->

                                             <!--opciones de detalle rlsegoria-->
                                             <td v-if="rls.condicion==0">
                                                 <button class="btn btn-success" @click="btnActivar(rls.id)"> 
                                                     <i class="far fa-check-circle"></i>  
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="rls.condicion==1">
                                                 <button class="btn btn-warning text-white"  @click="abrirModal('roles','actualizar',rls)"> 
                                                       <i class="fas fa-edit"></i>
                                                 </button> 
                                                 <button class="btn btn-primary" @click="btnDesactivar(rls.id)"> 
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
                                        <input type="text" v-model="nombrerol" class="form-control" placeholder="Ingrese nombre de rol">                                              
                                    </div>
                                    <div class="col-md-12  form-group">
                                        <label class=" form-control-label" for="text-input">Descripcion</label>
                                        <textarea type="text" v-model="descripcion" class="form-control" placeholder="Descripción de rol">
                                        </textarea>                                        
                                    </div>      
                                </div>
                                <div v-show="errorRol" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjRol" :key="error" v-text="error">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary col-md-12" @click="btnAgregaRol()"><i class="far fa-save"></i> Guardar</button>
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
                id_rol:0,
                nombre:'',
                descripcion:'',
                arrayRol:[],

                nombrerol:'',

                //modal
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorRol : 0,
                errorMostrarMsjRol : [],

                }                
        },
         computed:
        {
              
        },
        methods:{
         
           
            listarRoles(){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/rol';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayRol = respuesta.roles;
                  
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            btnAgregaRol(){
                  if (this.validarRol()){
                    return;
                }                
                let me = this;
                axios.post(me.ruta+'/rol/registrar',{
                    'nombre': this.nombrerol,
                    'descripcion': this.descripcion

                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Rol registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarRoles();
                }).catch(function (error) {
                    console.log(error);
                });
              
            },
            actualizarCategoria(){
                if (this.validarRol()){
                    return;
                }
                
                let me = this;

                 axios.put('/rol/actualizar',{                  
                    'nombre': this.nombrerol,
                    'descripcion': this.descripcion,              
                    'id': this.id_rol
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarRoles();
                }).catch(function (error) {
                    console.log(error);
                }); 
                
            },
            validarRol(){
                this.errorRol=0;
                this.errorMostrarMsjRol =[];

                if (!this.nombrerol) this.errorMostrarMsjRol.push("El nombre del rol no puede estar vacío.");
                if (!this.descripcion) this.errorMostrarMsjRol.push("La descripción no puede estar vacío.");             
                if (this.errorMostrarMsjRol.length) this.errorRol = 1;

                return this.errorRol;
            },
            btnActivar(idrol){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar el rol?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/rol/activar',{
                    'id': idrol
                    }).then(function(response){
                        me.listarRoles();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'El rol se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(idrol){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar el rol?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/rol/desactivar',{
                    'id': idrol
                    }).then(function(response){
                        me.listarRoles();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'El rol se ha desactivado con éxito',
                    'success'
                    )
                }
                })
            },
              cerrarModal(){
                this.modal=0;
                this.nombrerol='';
                this.descripcion='';  
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "roles":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Rol';
                                this.nombrerol='';
                                this.descripcion='';                              
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Rol';
                                this.tipoAccion=2;
                                this.id_rol=data['id'];
                                this.nombrerol = data['nombre'];
                                this.descripcion = data['descripcion'];                              
                                break;
                            }
                        }
                    }
                }
            },
        },
        mounted() {
             this.listarRoles();
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
