<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Cargo
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
                            <h5>Lista Cargos    
                                <button class="btn  btn-primary  pull-right"  @click="abrirModal('cargos','registrar')">Registrar Cargo</button>
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
                                        <tr v-for="cargo in arrayCargo" :key="cargo.id">
                                            <td v-text="cargo.id"> </td>
                                            <td  v-text="cargo.nombre"></td>
                                            <td  v-text="cargo.descripcion"></td>
                                            <!--cargoegoria activa o desactivada-->
                                             <td v-if="cargo.condicion==1">
                                               <span class="text-success" >Activo</span>  
                                             </td>
                                             <td v-else-if="cargo.condicion==0">
                                                <span class="text-danger" >Desactivado</span> 
                                             </td>
                                            <!--fin cargoegoria activa o desactivada-->

                                             <!--opciones de detalle cargoegoria-->
                                             <td v-if="cargo.condicion==0">
                                                 <button class="btn btn-success" @click="btnActivar(cargo.id)"> 
                                                     <i class="far fa-check-circle"></i>  
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="cargo.condicion==1">
                                                 <button class="btn btn-warning text-white"  @click="abrirModal('cargos','actualizar',cargo)"> 
                                                       <i class="fas fa-edit"></i>
                                                 </button> 
                                                 <button class="btn btn-primary" @click="btnDesactivar(cargo.id)"> 
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
                                        <input type="text" v-model="nombrecargo" class="form-control" placeholder="Ingrese nombre de cargo">                                              
                                    </div>
                                    <div class="col-md-12  form-group">
                                        <label class=" form-control-label" for="text-input">Descripcion</label>
                                        <textarea type="text" v-model="descripcion" class="form-control" placeholder="Descripción del cargo">
                                        </textarea>                                        
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
                id_cargo:0,
                nombre:'',
                descripcion:'',
                arrayCargo:[],

                nombrecargo:'',

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
         
           
            listarCargos(){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/cargo';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCargo = respuesta.cargos;
                  
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
                    'nombre': this.nombrecargo,
                    'descripcion': this.descripcion

                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Cargo registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarCargos();
                }).catch(function (error) {
                    console.log(error);
                });
              
            },
            actualizarCategoria(){
                if (this.validarCargo()){
                    return;
                }
                
                let me = this;

                 axios.put('/cargo/actualizar',{                  
                    'nombre': this.nombrecargo,
                    'descripcion': this.descripcion,              
                    'id': this.id_cargo
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCargos();
                }).catch(function (error) {
                    console.log(error);
                }); 
                
            },
            validarCargo(){
                this.errorCargo=0;
                this.errorMostrarMsjCargo =[];

                if (!this.nombrecargo) this.errorMostrarMsjCargo.push("El nombre del cargo no puede estar vacío.");
                if (!this.descripcion) this.errorMostrarMsjCargo.push("La descripción no puede estar vacío.");             
                if (this.errorMostrarMsjCargo.length) this.errorCargo = 1;

                return this.errorCargo;
            },
            btnActivar(idcargo){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar el cargo?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/cargo/activar',{
                    'id': idcargo
                    }).then(function(response){
                        me.listarCargos();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'El cargo se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(idcargo){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar el cargo?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/cargo/desactivar',{
                    'id': idcargo
                    }).then(function(response){
                        me.listarCargos();
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'El cargo se ha desactivado con éxito',
                    'success'
                    )
                }
                })
            },
              cerrarModal(){
                this.modal=0;
                this.nombrecargo='';
                this.descripcion='';  
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "cargos":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Cargo';
                                this.nombrecargo='';
                                this.descripcion='';                              
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Cargo';
                                this.tipoAccion=2;
                                this.id_cargo=data['id'];
                                this.nombrecargo = data['nombre'];
                                this.descripcion = data['descripcion'];                              
                                break;
                            }
                        }
                    }
                }
            },
        },
        mounted() {
             this.listarCargos();
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
