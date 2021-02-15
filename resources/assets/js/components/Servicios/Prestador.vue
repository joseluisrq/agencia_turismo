<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Prestador
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
                          
                                <div v-if="vistaFormulario==false">
                                      <button class="btn  btn-primary  pull-right"  @click="abrirModal('prestador','registrar')">Registrar Prestador</button>
                                 </div>
                                 <div v-else-if="vistaFormulario==true">
                                      <button class="btn  btn-primary  pull-right"  @click="cerrarModal()">Cerrar Formulario</button>
                                 </div>
                                                                                 
                        </div>
                        
                        <div class="card-body">      
                                <div class="col-md-12" v-if="vistaFormulario==true">
                                    <h5 class="text-center">{{tituloModal}}</h5>
                                   <div class="modal-body card">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Nombre (*)</label>
                                                    <input type="text" v-model="nombres" class="form-control" placeholder="Ingrese nombres">                                              
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Apellidos (*)</label>
                                                    <input type="text" v-model="apellidos" class="form-control" placeholder="Ingrese apellidos">                                              
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Tipo Documento </label>
                                                    <select class="form-control col-md-12" v-model="tipo_documento">                                                    
                                                        <option value="DNI">DNI</option>
                                                        <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA	</option>
                                                        <option value="PASAPORTE">PASAPORTE </option>                                                        
                                                    </select>        
                                                 </div>
                                                <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Número de Documento</label>
                                                    <input type="text" v-model="dni" class="form-control" placeholder="Ingrese número de Documento">                                              
                                                </div>
                                                    <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Sexo(*)</label>
                                                    <select class="form-control col-md-12" v-model="sexo">                                                    
                                                        <option value="1">Masculino</option>
                                                        <option value="0">Femenino</option>                                                                                        
                                                    </select>        
                                                 </div>
                                                 <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Teléfono</label>
                                                    <input type="text" v-model="telefono" class="form-control" placeholder="Ingrese numero de teéfono o celular">                                              
                                                </div>
                                                  <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Email</label>
                                                    <input type="email" v-model="email" class="form-control" placeholder="Ingrese E-mail">                                              
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Pais </label>
                                                    <input type="text" v-model="pais" class="form-control" placeholder="Ingrese Pais">                                              
                                                </div>
                                                 <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Ciudad </label>
                                                    <input type="text" v-model="ciudad" class="form-control" placeholder="Ingrese ciudad">                                              
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label class=" form-control-label" for="text-input">Dirección </label>
                                                    <input type="text" v-model="direccion" class="form-control" placeholder="Ingrese dirección">                                              
                                                </div>
                                                 
                                                  
                                            </div>
                                            <div v-show="errorForm" class="form-group row div-error">
                                                <div class="text-center text-error">
                                                    <div v-for="error in errorMostrarMsjForm" :key="error" v-text="error">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <button type="button" v-if="tipoAccion==1" class="btn btn-primary col-md-12" @click="btnAgregarPrestador()"><i class="far fa-save"></i> Guardar</button>
                                                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary col-md-12" @click="actualizarPrestador()"><i class="fas fa-redo"></i> Actualizar</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-secondary col-md-12" @click="cerrarModal()"><i class="far fa-times-circle"></i> Cancelar</button>
                                                </div>
                                            </div>
                                        </form>     
                                    </div>               
                                </div> 
                                 <div class="col-md-12" v-if="vistaDetalle==true">
                                      <button class="btn btn-outline-info "  title="Detalle" @click="abrirModal('prestador','actualizar')"> 
                                                       <i class="fas fa-user-cog"></i> Editar Prestador
                                       </button> 
                                        <button class="btn btn-outline-info "  title="Detalle" @click="lista=true, vistaDetalle=false"> 
                                                       <i class="fas fa-user-cog"></i> Lista de Prestadores
                                       </button> 
                                    <h5 class="text-center">{{tituloModal}}</h5>
                                   <div class="modal-body card">                                     
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><strong>Tipo Documento</strong>  : {{tipo_documento}}</li>
                                                        <li class="list-group-item"><strong>N° Documento</strong>  : {{dni}}</li>
                                                        <li class="list-group-item"><strong>Nombres</strong>  : {{nombres}}</li>
                                                        <li class="list-group-item"><strong>Apellidos</strong>  : {{apellidos}}</li>
                                                        <li class="list-group-item" v-if="sexo==1"><strong>Sexo</strong>  : Masculino</li>
                                                        <li class="list-group-item" v-if="sexo==2"><strong>Nombre</strong>  : Femenino</li>
                                                        <li class="list-group-item"><strong>Teléfono</strong>  : {{telefono}}</li>
                                                        <li class="list-group-item"><strong>Email</strong>  : {{email}}</li>
                                                        <li class="list-group-item"><strong>Pais</strong>  : {{pais}}</li>
                                                        <li class="list-group-item"><strong>Ciudad</strong>  : {{ciudad}}</li>
                                                        <li class="list-group-item"><strong>Direccion</strong>  : {{direccion}}</li>
                                                    </ul>                                            
                                                </div>       
                                            </div>   
                                    </div>               
                                </div>                           
                           
                           <template v-if="lista">  
                            <div class="col-md-6">                                    
                                <div class="input-group"> 
                                    <select class="form-control col-md-6" v-model="criterio">
                                        <option value="nombres">Nombres</option>
                                        <option value="apellidos">Apellidos</option>
                                        <option value="dni">N° Documento </option>
                                        <option value="pais">Pais</option>
                                        <option value="ciudad">Ciudad</option>
                                        <option value="telefono">Teléfono</option>
                                            <option value="email">Email</option>
                                    </select>             
                                    <input type="text" v-model="buscar" @keyup.enter="listarPrestador(1,buscar,criterio)" 
                                    class="form-control form-control" placeholder="Texto a buscar">                                        
                                    <button type="submit" @click="listarPrestador(1,buscar,criterio)" 
                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-search"></i>  
                                        <i class="mdi mdi-magnify"></i> Buscar
                                    </button>
                                </div>
                            </div>  
                              <!--tabla de lista de categorias-->
                            <div class="table-responsive col-md-12 mt-4">
                                  <h5 class="text-center">Lista de Prestadores</h5><hr>
                                <table class="table table-responsive table-bordered ">
                                    <thead class="">
                                        <tr>
                                        <th scope="col">N° Doc</th>
                                        <th scope="col">Nombre</th>                                       
                                        <th scope="col">Apellidos</th>                                        
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Pais</th>
                                         <th scope="col">Teléfono</th>
                                            <th scope="col">Email</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col"></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="element in arrayPrestador" :key="element.id">
                                            <td  v-text="element.dni"></td>
                                            <td>{{element.nombres}}</td>
                                            <td v-text="element.apellidos"></td>
                                            <td  v-text="element.ciudad" ></td>
                                            <td  v-text="element.pais"></td>
                                            <td  v-text="element.telefono"></td>
                                            <td  v-text="element.email"></td>

                                            <!--activa o desactivada-->
                                             <td v-if="element.condicion==1">
                                                <span class="text-info" >Activo</span>  
                                             </td>
                                             <td v-else-if="element.condicion==0">
                                                <span class="text-danger" >Desactivado</span> 
                                             </td>

                                             
                                            <!--fin  activa o desactivada-->

                                             <!--opciones de detalle servicio-->
                                             <td v-if="element.condicion==0">
                                                 <button class="btn btn-success" title="activar" @click="btnActivar(element.id)"> 
                                                     <i class="far fa-check-circle"></i>  
                                                 </button>                                                        
                                             </td>
                                             <td v-else-if="element.condicion==1">
                                                 <button class="btn btn-outline-info "  title="Detalle" @click="abrirModal('prestador','vista',element)"
                                                 > 
                                                       <i class="fas fa-user-cog"></i>
                                                 </button> 
                                                 <button class="btn btn-outline-info"  title="Desactivar"  @click="btnDesactivar(element.id)"> 
                                                       <i class="fas fa-minus-circle"></i>
                                                 </button>      
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
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    <!--fin contenido-->


</main>

</template>

<script>

    export default {
        props : ['ruta'],
        data(){
            return{
                id_prestador:0,
                nombres:'',
                apellidos:'',
                tipo_documento:'DNI',
                dni:'',
                direccion:'',
                ciudad:'',
                pais:'',
                telefono:'',
                email:'',
                sexo:'',
                

                arrayPrestador:[],

                //formulario 
                vistaFormulario:false,
             
                lista:true,

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
                criterio : 'dni', 
                buscar : '',

                //modal
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorForm : 0,
                errorMostrarMsjForm : [],
                vistaDetalle:false

            

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
                me.listarPrestador(page,buscar,criterio);
            },
           
            listarPrestador(page,buscar,criterio){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/prestador?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayPrestador = respuesta.prestadores.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            
           
            btnAgregarPrestador(){
                  if (this.validarForm()){
                    return;
                }                
                let me = this;
              
                axios.post(me.ruta+'/empleado/registrar',{
                    
                    'nombres': this.nombres,
                    'apellidos': this.apellidos,
                    'tipo_documento': this.tipo_documento,
                    'dni': this.dni,
                    'direccion': this.direccion,
                    'ciudad': this.ciudad,
                    'pais': this.pais,
                    'telefono': this.telefono,
                    'email': this.email,
                    'sexo': this.sexo,      
                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Prestador de Servicio Registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarPrestador(1,me.buscar,me.criterio);
                }).catch(function (error) {
                    console.log(error);
                });
              
            },
            btnDetalle(){
                let me=this;
                me.lista=false;
            },
             
            actualizarPrestador(){
                if (this.validarForm()){
                    return;
                }
                
                let me = this;

                 axios.put(me.ruta+'/prestador/actualizar',{                  
                    'nombres': this.nombres,
                    'apellidos': this.apellidos,
                    'tipo_documento': this.tipo_documento,
                    'dni': this.dni,
                    'direccion': this.direccion,     
                    'ciudad': this.ciudad,    
                    'pais': this.pais,    
                    'telefono': this.telefono,             
                    'email': this.email,    
                    'sexo': this.sexo,    

                    'id': this.id_prestador
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPrestador(1,'','nombre');
                     Swal.fire(
                    '',
                    'Registro actualizado con éxito',
                    'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                }); 
                
            },
            validarForm(){
                this.errorForm=0;
                this.errorMostrarMsjForm =[];

                if (!this.nombres) this.errorMostrarMsjForm.push("El nombre del prestador no puede estar vacío."); 
                if (!this.apellidos) this.errorMostrarMsjForm.push("El apellido del prestador no puede estar vacío.");    
                //if (!this.dni) this.errorMostrarMsjForm.push("El número de documento esta vació");    
                //if (!this.tipo_documento) this.errorMostrarMsjForm.push("Selecione el tipo de documento.");    
               // if (!this.telefono) this.errorMostrarMsjForm.push("El teléfono del cliente no puede estar vacío.");    
               //if (!this.email) this.errorMostrarMsjForm.push("El email del cliente no puede estar vacío.");    
               // if (!this.pais) this.errorMostrarMsjForm.push("El pais del cliente no puede estar vacío."); 
               // if (!this.ciudad) this.errorMostrarMsjForm.push("La ciudad del cliente no puede estar vacío.");    
               // if (!this.direccion) this.errorMostrarMsjForm.push("La direccion del cliente no puede estar vacío.");     

             
                          
                if (this.errorMostrarMsjForm.length) this.errorForm = 1;

                return this.errorForm;
            },
            btnActivar(id){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar al prestador?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/prestador/activar',{
                    'id': id
                    }).then(function(response){
                        me.listarPrestador(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'El prestador se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(id){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar al prestador?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/prestador/desactivar',{
                    'id': id
                    }).then(function(response){
                        me.listarPrestador(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'El prestador se ha desactivado con éxito',
                    'success'
                    )
                }
                })
            },
              cerrarModal(){
                this.nombres='';
                this.apellidos='';
                this.tipo_documento='';
                this.direccion='';
                this.ciudad='';
                this.pais='';
                this.telefono='';
                this.email='';
                this.sexo='';         

                this.vistaFormulario=false;
                this.lista=true;
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "prestador":
                    {
                        switch(accion){
                            case 'registrar':
                            {   
                                this.vistaFormulario=true;
                                this.modal = 1;
                                this.tituloModal = 'Registrar Prestador';
                                this.nombres='';
                                this.apellidos='';
                                this.tipo_documento='';
                                this.direccion='';
                                this.ciudad='';
                                this.pais='';
                                this.telefono='';
                                this.email='';
                                this.sexo='';                          
                                this.tipoAccion = 1;    
                                this.lista=true;  
                                 this.vistaDetalle=false;             
                    
                      
                                break;
                            }
                            case 'vista':
                            {
                                //console.log(data);
                                this.vistaDetalle=true;
                                this.modal=1;
                                this.tituloModal='Detalle de Prestador de Servicios';
                                this.tipoAccion=2;
                                this.nombres=data['nombres'];
                                this.apellidos=data['apellidos'];
                                this.tipo_documento=data['tipo_documento'];
                                this.dni=data['dni'];
                                this.direccion=data['direccion'];
                                this.ciudad=data['ciudad'];
                                this.pais=data['pais'];
                                this.telefono=data['telefono'];
                                this.email=data['email'];
                                this.sexo=data['sexo'];  
                                this.id_prestador=data['id'];               
                                this.btnDetalle();
                              
                                
                                                  
                                break;
                            }
                             case 'actualizar':
                            {
                                //console.log(data);
                                this.vistaFormulario=true;
                                this.modal=1;
                                this.tituloModal='Actualizar Prestador';
                                this.tipoAccion=2;
                                 this.vistaDetalle=false;
                                    
                                                             
                                
                                                  
                                break;
                            }
                        }
                    }
                }
            },    

        },
     
        mounted() {
             this.listarPrestador(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    
 
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color:#ff8084 !important;
        font-weight: bold;
    }
   
</style>
