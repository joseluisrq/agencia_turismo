<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Cajas
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
                            <h5>Detalle de cajas 
                                <button class="btn  btn-primary  pull-right"  v-if="cajaabierta_p==0" @click="abrirModal('roles','registrar')">Abrir Caja</button>
                            </h5>                                                        
                        </div>
                        
                        <div class="card-body">                           
                           
                                                        
                           
                         <!--tabla de lista de categorias-->
                            <div class="table-responsive col-md-12 mt-4">
                                  <h5 class="text-center">Lista de Cajas</h5><hr>
                                <table class="table table-responsive table-bordered ">
                                    <thead class="">
                                        <tr>
                                             <th scope="col">Opciones </th>
                                        <th scope="col">N° </th>
                                        <th scope="col">Usuario</th>                                       
                                        <th scope="col">Fecha de Apertura</th>   
                                        <th scope="col">Fecha de cierre</th>
                                        <th scope="col">Monto total</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="element in arrayCaja" :key="element.id">
                                              <td >
                                                 <button class="btn btn-info" title="activar" @click="BtnDetalle(element.id)"> 
                                                  Ver
                                                 </button>                                                        
                                             </td>
                                            <td  v-text="element.id"></td>
                                            <td>{{element.usuario}}</td>
                                            <td v-text="element.fecha_hora_inicial"></td>
                                             <td  v-text="element.fecha_hora_final"></td>
                                            <td  v-text="element.final"></td>

                                            <!--activa o desactivada-->
                                             <td v-if="element.estado==1">
                                                <span class="text-info" >Abierta</span>  
                                             </td>
                                             <td v-else-if="element.estado==0">
                                                <span class="text-danger" >Cerrada</span> 
                                             </td>

                                             
                                            <!--fin  activa o desactivada-->

                                             <!--opciones de detalle servicio-->
                                             <td v-if="element.estado==1">
                                                 <button class="btn btn-success" title="activar" @click="btnCerrarCaja(element.id)"> 
                                                   Cerrar Caja
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="element.estado==0">
                                                -
                                                
                                             </td>
                                             
                                              <!--fin opciones de detalle -->
                                        </tr>                                               
                                    </tbody>
                                </table>
                                <!--paginacion-->
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item" v-if="pagination.current_page > 1">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Anterior</a>
                                        </li>
                                        <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                        </li>
                                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
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
                                        <label class=" form-control-label" for="text-input">Monto Incial (*)</label>
                                        <input type="number" v-model="monto_inicial" class="form-control" placeholder="">                                              
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
                                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary col-md-12" @click="btnAbrirCaja()"><i class="far fa-save"></i> Abrir Caja</button>
                                          
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
                arrayCaja:[],

                nombrerol:'',
                 monto_inicial:0,     

                //modal
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorRol : 0,
                errorMostrarMsjRol : [],
                    cajaabierta_p: 0,


                   pagination : 
                {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                   offset : 3,
                criterio : 'id', 
                buscar : '',
            

                }    

                  //Paginacion
             
            
        },
         computed:
        {
               isActived: function(){
                    return this.pagination.current_page;
                },
                //Calcula los elementos de la paginación
                pagesNumber: function() {
                    if(!this.pagination.to) {
                        return [];
                    }
                    
                    var from = this.pagination.current_page - this.offset; 
                    if(from < 1) {
                        from = 1;
                    }

                    var to = from + (this.offset * 2); 
                    if(to >= this.pagination.last_page){
                        to = this.pagination.last_page;
                    }  

                    var pagesArray = [];
                    while(from <= to) {
                        pagesArray.push(from);
                        from++;
                    }
                    return pagesArray;             

                } 
        },
        methods:{
          cambiarPagina(page,buscar,criterio)
            {   let me = this;
                me.pagination.current_page = page;
                me.lsitarCajas(page,buscar,criterio);
            },
           
           
            lsitarCajas(page,buscar,criterio){
                 let me=this;
                me.listado=2;
                me.cajaabierta_p=0;
                me.arrayCaja=[];
                var url= me.ruta+'/caja?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCaja = respuesta.cajas.data;
                    me.cajaabierta_p = respuesta.abierta[0].id;
                    me.pagination= respuesta.pagination;

                   
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            btnAbrirCaja(){
                                
                let me = this;
                me.arrayCaja=[];
                axios.post(me.ruta+'/caja/registrar',{
                    'monto': this.monto_inicial,               

                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Caja registrada',
                    showConfirmButton: false,
                    timer: 1500
                    })
                   
                }).catch(function (error) {
                    console.log(error);
                });

                  me.lsitarCajas(1,this.buscar,this.criterio);
                  me.$forceUpdate();
              
            },
          
        
            btnCerrarCaja(id){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de Cerrar la caja?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cerrar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/caja/cerrar',{
                    'id': id
                    }).then(function(response){
                       
                    
                        me.lsitarCajas(1,this.buscar,this.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Cerrada!',
                    'La caja se ha cerrada con éxito',
                    'success'
                    )
                    
                }
                });

                me.$forceUpdate();
            },
          
              cerrarModal(){
                this.modal=0;
                 this.monto_inicial=0;
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "roles":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Abrir Caja';
                                this.monto_inicial;
                                this.tipoAccion = 1;
                                break;
                            }
                          
                        }
                    }
                }
            },
        },
        mounted() {
             this.lsitarCajas(1,this.buscar,this.criterio);
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
