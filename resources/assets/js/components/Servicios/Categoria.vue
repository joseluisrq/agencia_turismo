<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Categoria Servicio
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
                            <h5>Lista categorias    
                                <button class="btn  btn-primary  pull-right"  @click="abrirModal('categoria','registrar')">Registrar Categoria</button>
                            </h5>                                                        
                        </div>
                        
                        <div class="card-body">                           
                           
                                <div class="col-md-6">
                                    <div class="input-group">              
                                        <input type="text" v-model="buscar" @keyup.enter="listarCategoria(1,buscar,'nombre')" 
                                        class="form-control form-control" placeholder="Nombre de categoria">                                        
                                        <button type="submit" @click="listarCategoria(1,buscar,criterio)" 
                                            class="btn btn-outline-primary btn-sm"><i class="fa fa-search"></i>  
                                            <i class="mdi mdi-magnify"></i> Buscar
                                        </button>
                                    </div>
                                </div>                                 
                           
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
                                        <tr v-for="cat in arrayCategoria" :key="cat.id">
                                            <td v-text="cat.id"> </td>
                                            <td  v-text="cat.nombre"></td>
                                            <td  v-text="cat.descripcion"></td>
                                            <!--categoria activa o desactivada-->
                                             <td v-if="cat.condicion==1">
                                               <span class="text-success" >Activo</span>  
                                             </td>
                                             <td v-else-if="cat.condicion==0">
                                                <span class="text-danger" >Desactivado</span> 
                                             </td>
                                            <!--fin categoria activa o desactivada-->

                                             <!--opciones de detalle categoria-->
                                             <td v-if="cat.condicion==0">
                                                 <button class="btn btn-success" @click="btnActivar(cat.id)"> 
                                                     <i class="far fa-check-circle"></i>  
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="cat.condicion==1">
                                                 <button class="btn btn-warning text-white"  @click="abrirModal('categoria','actualizar',cat)"> 
                                                       <i class="fas fa-edit"></i>
                                                 </button> 
                                                 <button class="btn btn-primary" @click="btnDesactivar(cat.id)"> 
                                                       <i class="fas fa-minus-circle"></i>
                                                 </button>      
                                             </td>
                                              <!--fin opciones de detalle categoria-->
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
                                        <label class=" form-control-label" for="text-input">Nombre (*)</label>
                                        <input type="text" v-model="nombrecategoria" class="form-control" placeholder="Ingrese nombre de categoria">                                              
                                    </div>
                                    <div class="col-md-12  form-group">
                                        <label class=" form-control-label" for="text-input">Descripcion</label>
                                        <textarea type="text" v-model="descripcion" class="form-control" placeholder="Descripción de Categoría">
                                        </textarea>                                        
                                    </div>      
                                </div>
                                <div v-show="errorCategoria" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary col-md-12" @click="btnAgregarCategoria()"><i class="far fa-save"></i> Guardar</button>
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
                id_categoria:0,
                nombre:'',
                descripcion:'',
                arrayCategoria:[],

                nombrecategoria:'',

                 //Paginacion
                pagination : 
                {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                //busqueda
                offset : 3,
                criterio : 'nombre', 
                buscar : '',

                //modal
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : [],

                }                
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
                me.listarCategoria(page,buscar,criterio);
            },
           
            listarCategoria(page,buscar,criterio){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/categoria?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCategoria = respuesta.categorias.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            btnAgregarCategoria(){
                  if (this.validarCategoria()){
                    return;
                }                
                let me = this;
                axios.post(me.ruta+'/categoria/registrar',{
                    'nombre': this.nombrecategoria,
                    'descripcion': this.descripcion

                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Categoría registrada',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarCategoria(1,me.buscar,me.criterio);
                }).catch(function (error) {
                    console.log(error);
                });
              
            },
            actualizarCategoria(){
                if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                 axios.put('/categoria/actualizar',{                  
                    'nombre': this.nombrecategoria,
                    'descripcion': this.descripcion,              
                    'id': this.id_categoria
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCategoria(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
                
            },
            validarCategoria(){
                this.errorCategoria=0;
                this.errorMostrarMsjCategoria =[];

                if (!this.nombrecategoria) this.errorMostrarMsjCategoria.push("El nombre de la categoria no puede estar vacío.");
                if (!this.descripcion) this.errorMostrarMsjCategoria.push("La descripción no puede estar vacío.");             
                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;

                return this.errorCategoria;
            },
            btnActivar(idcategoria){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar la categoría?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/categoria/activar',{
                    'id': idcategoria
                    }).then(function(response){
                        me.listarCategoria(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'La categoría se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(idcategoria){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar la categoría?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/categoria/desactivar',{
                    'id': idcategoria
                    }).then(function(response){
                        me.listarCategoria(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'La categoría se ha desactivado con éxito',
                    'success'
                    )
                }
                })
            },
              cerrarModal(){
                this.modal=0;
                this.nombrecategoria='';
                this.descripcion='';  
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "categoria":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoria';
                                this.nombrecategoria='';
                                this.descripcion='';                              
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Usuario';
                                this.tipoAccion=2;
                                this.id_categoria=data['id'];
                                this.nombrecategoria = data['nombre'];
                                this.descripcion = data['descripcion'];                              
                                break;
                            }
                        }
                    }
                }
            },
        },
        mounted() {
             this.listarCategoria(1,this.buscar,this.criterio);
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
