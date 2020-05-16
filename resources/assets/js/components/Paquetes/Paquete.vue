<template>
  
<main>
    <!-- cotaniner inicio-->
       <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Paquetes Turísticos
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
                        <div class="card-body">      
                                <div class="col-md-12" v-if="vistaFormulario==true">
                                    <h5 class="text-center">{{tituloModal}}</h5>
                                   <div class="modal-body card">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row">
                                              
                                                <div class="col-md-3 form-group">
                                                    <label class=" form-control-label" for="text-input">Tipo Documento</label>
                                                    <select class=" form-control" v-model="tipo_documento">  
                                                         <option disabled value="">Seleccione un elemento</option>                                                  
                                                         <option v-for="doc in arrayDocumento" :key="doc.index" :value="doc" v-text="doc"></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label class=" form-control-label" for="text-input">Número de Documento(*)</label>
                                                    <input type="text" v-model="dni" class="form-control" placeholder="Ingrese n° de Documento">                                              
                                                </div>
                                                    <div class="col-md-3 form-group">
                                                    <label class=" form-control-label" for="text-input">Sexo(*)</label>
                                                    <select class="form-control col-md-12" v-model="sexo">   
                                                        <option disabled value="">Seleccione un elemento</option>                                                           
                                                        <option value="1">Masculino</option>
                                                        <option value="0">Femenino</option>                                                                                        
                                                    </select>        
                                                 </div>
                                                <div class="col-md-3 form-group">
                                                    <label class=" form-control-label" for="text-input">Cargo (*)</label>
                                                    <select class=" form-control" v-model="idcargoSelect">
                                                        <option value="0" disabled>Selecione cargo</option>
                                                         <option v-for="cargo in arrayCargos" :key="cargo.id" :value="cargo.id" v-text="cargo.nombre"></option>
                                                    </select>
                                                </div>
                                                  <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Nombre (*)</label>
                                                    <input type="text" v-model="nombres" class="form-control" placeholder="Ingrese nombres">                                              
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Apellidos (*)</label>
                                                    <input type="text" v-model="apellidos" class="form-control" placeholder="Ingrese apellidos">                                              
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Teléfono</label>
                                                    <input type="text" v-model="telefono" class="form-control" placeholder="Ingrese número de teléfono o celular">                                              
                                                </div>
                                                  <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Email</label>
                                                    <input type="email" v-model="email" class="form-control" placeholder="Ingrese E-mail">                                              
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Pais </label>
                                                    <input type="text" v-model="pais" class="form-control" placeholder="Ingrese Pais">                                              
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Ciudad </label>
                                                    <input type="text" v-model="ciudad" class="form-control" placeholder="Ingrese ciudad">                                              
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <label class=" form-control-label" for="text-input">Dirección </label>
                                                    <input type="text" v-model="direccion" class="form-control" placeholder="Ingrese dirección">                                              
                                                </div>

                                             

                                                <div class="col-md-6 form-group">
                                                    <div v-if="botonUsuario==true">
                                                          <button type="button" class="btn btn-outline-danger btn-sm" v-if="vistaUsuario==false" @click="selectRol();">Crear Usuario</button>                                             
                                                             <button type="button" class="btn btn-outline-danger btn-sm" v-else-if="vistaUsuario==true" @click="vistaUsuario=false">Cancelar Usuario</button>                                             
   
                                                    </div>
                                                  </div>

                                             
                                                
                                                 
                                                  
                                            </div>
                                            <div v-show="errorForm" class="form-group row div-error">
                                                <div class="text-center text-error">
                                                    <div v-for="error in errorMostrarMsjForm" :key="error" v-text="error">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" v-if="vistaUsuario==true">
                                                <div class="col-md-12">
                                                     <hr>
                                                    <p class="text-center " style="font-size:16px;">Registrar Usuario</p>
                                                     <hr>
                                                </div>
                                               
                                                 <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Usuario (*)</label>
                                                    <input type="text" v-model="usuario" class="form-control" placeholder="ingrese Usuario">                                              
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Contraseña (*)</label>
                                                    <input type="text" v-model="password_uno" class="form-control" placeholder="*****">                                              
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label class=" form-control-label" for="text-input">Repita contraseña (*)</label>
                                                    <input type="text" v-model="password_dos" class="form-control" placeholder="*****">                                              
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class=" form-control-label" for="text-input">Rol (*)</label>
                                                    <select class=" form-control" v-model="idrolSelect">
                                                        <option value="0" disabled>Selecione rol</option>
                                                         <option v-for="rol in arrayRoles" :key="rol.id" :value="rol.id" v-text="rol.nombre"></option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                               <div class="col-md-12">
                                                   <hr>
                                               </div>
                                            </div>

                                            <div class="row text-center">
                                                
                                                <div class="col-md-12 text-center" >
                                                    <button type="button" v-if="tipoAccion==1" class="btn btn-outline-primary col-md-4" @click="lbtnAgregarEmpleado()"><i class="far fa-save"></i> Guardar</button>
                                                    <button type="button" v-if="tipoAccion==2" class="btn btn-outline-primary col-md-4" @click="actualizarEmpleado()"><i class="fas fa-redo"></i> Actualizar</button>
                                                
                                                    <button type="button" class="btn btn-outline-primary col-md-4" @click="cerrarModal()"><i class="far fa-times-circle"></i> Cancelar</button>
                                                </div>
                                            </div>
                                            <hr class="mt-4">
                                             
                                        </form>     
                                    </div>               
                                </div> 
                                 <div class="col-md-12" v-if="vistaDetalle==true">
                                      <button class="btn btn-outline-info "  title="Detalle" @click="abrirModal('empleado','actualizar')"> 
                                                       <i class="fas fa-user-cog"></i> Editar Empleado
                                       </button> 
                                        <button class="btn btn-outline-info "  title="Detalle" @click="lista=true, vistaDetalle=false"> 
                                                       <i class="fas fa-user-cog"></i> Lista de Empleados
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
                                                          <li class="list-group-item"><strong>Cargo</strong>  : {{cargo}}</li>
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarPaquete(1,buscar,criterio)" 
                                    class="form-control form-control" placeholder="Texto a buscar">                                        
                                    <button type="submit" @click="listarPaquete(1,buscar,criterio)" 
                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-search"></i>  
                                        <i class="mdi mdi-magnify"></i> Buscar
                                    </button>
                                </div>
                            </div>  
                              <!--tabla de lista de categorias-->
                            <div class="table-responsive col-md-12 mt-4">
                                  <h5 class="text-center">Lista de Paquetes vendidos</h5><hr>
                                <table class="table table-responsive table-bordered ">
                                    <thead class="">
                                        <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Vendedor</th>                                       
                                        <th scope="col">Tipo Comprobante</th>   
                                        <th scope="col">N° Comprobante</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                          <th scope="col">Estado</th>
                                        <th scope="col">Opciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="element in arrayPaquetes" :key="element.id">
                                            <td  v-text="element.id"></td>
                                            <td>{{element.nombres}}</td>
                                            <td v-text="element.tipo_comprobante"></td>
                                             <td  v-text="element.num_comprobante"></td>
                                            <td  v-text="element.fecha_hora"></td>                                          
                                            <td  v-text="element.total"></td>       
                                                         

                                            <template v-if="element.estado=='Registrado'">
                                                    <td> <span style="color: rgb(253, 136, 137);"><i class="fas fa-circle"></i></span> {{element.estado}}</td>                                                      
                                                    <td >
                                                        <button class="btn btn-outline-info "  title="Detalle" @click="abrirModal('empleado','vista',element)"
                                                        > 
                                                         <i class="far fa-file-alt"></i>
                                                        </button> 
                                                        <button class="btn btn-outline-info"  title="Desactivar"  @click="btnDesactivar(element.id)"> 
                                                            <i class="fas fa-minus-circle"></i>
                                                        </button>      
                                                </td>
                                            </template>   

                                            <template v-else-if="element.estado=='Anulado'">   
                                                  <td> <span style="color: rgb(253, 136, 137);"><i class="fas fa-circle"></i></span> {{element.estado}}</td>   
                                                 
                                                 <td  >
                                                 <button class="btn btn-outline-info "  title="Detalle" @click="abrirModal('empleado','vista',element)"                                                 > 
                                                    <i class="far fa-file-alt"></i>
                                                 </button>  
                                                  </td>                                     
                                                
                                            </template>
                                          
                                             
                                             
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
                id_empleado:0,
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
                idrolSelect:0,
                idcargoSelect:0,
                cargo:"",
                botonUsuario:true,
                

                arrayPaquetes:[],
                  arrayRoles:[],
                    arrayCargos:[],

                    arrayDocumento:[
                       'DNI',
                       'PASAPORTE'
                    ],

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
                vistaDetalle:false,

                //usuario
                vistaUsuario:false,
                usuario:'',
                password_uno:'',
                password_dos:'',



            

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
                me.listarPaquete(page,buscar,criterio);
            },
           
            listarPaquete(page,buscar,criterio){
                let me=this;
                me.listado=2;
                var url= me.ruta+'/paquete?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayPaquetes = respuesta.paquetes.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
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
              selectCargo(){
                let me=this;
               // me.vistaUsuario=true;
                var url= me.ruta+'/cargo/selectCargo';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCargos = respuesta.cargos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
           
            lbtnAgregarEmpleado(){
                  if (this.validarForm()){
                    return;
                }                
                let me = this;
                  if(this.vistaUsuario==true){
                        
                        axios.post(me.ruta+'/usuario/registrar',{
                            
                            'nombres': this.nombres,
                            'apellidos': this.apellidos,
                            'tipo_documento': this.tipo_documento,
                            'dni': this.dni,
                            'direccion': this.direccion,
                            'ciudad': this.ciudad,
                            'pais': this.pais,
                            'telefono': this.telefono,
                            'email': this.email,
                            'sexo': this.sexo ,  
                            'usuario':this.usuario,
                            'password':this.password_uno,
                            'idrol':this.idrolSelect,
                               'idcargo':this.idcargoSelect
                        }).then(function (response) {
                            me.cerrarModal();
                            Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'Empleado Registrado',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            me.listarPaquete(1,me.buscar,me.criterio);
                        }).catch(function (error) {
                            console.log(error);
                        });
                    }

                    else{
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
                    'sexo': this.sexo ,  
                      'idcargo':this.idcargoSelect
                  
                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Empleado Registrado',
                    showConfirmButton: false,
                    timer: 1500
                    })
                     me.listarPaquete(1,me.buscar,me.criterio);
                }).catch(function (error) {
                    console.log(error);
                });
                    }
              
              
              
            },
            btnDetalle(){
                let me=this;
                me.lista=false;
            },
             
            actualizarEmpleado(){
                if (this.validarForm()){
                    return;
                }
                
                let me = this;

                 axios.put('/empleado/actualizar',{                  
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

                    'id': this.id_empleado
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPaquete(1,'','nombre');
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
                let expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                 if(this.email){
                        if (!expr.test(this.email)) this.errorMostrarMsjForm.push("Ingrese un correo valido");
                }
                if (!this.nombres) this.errorMostrarMsjForm.push("El nombre del empleado no puede estar vacío."); 
                if (!this.apellidos) this.errorMostrarMsjForm.push("El apellido del empleado no puede estar vacío.");    
                if (!this.dni) this.errorMostrarMsjForm.push("El número de documento esta vació");    
                if (!this.tipo_documento) this.errorMostrarMsjForm.push("Selecione el tipo de documento.");    
               // if (!this.telefono) this.errorMostrarMsjForm.push("El teléfono del cliente no puede estar vacío.");    
               //if (!this.email) this.errorMostrarMsjForm.push("El email del cliente no puede estar vacío.");    
               // if (!this.pais) this.errorMostrarMsjForm.push("El pais del cliente no puede estar vacío."); 
               // if (!this.ciudad) this.errorMostrarMsjForm.push("La ciudad del cliente no puede estar vacío.");    
               // if (!this.direccion) this.errorMostrarMsjForm.push("La direccion del cliente no puede estar vacío.");     

                if(this.vistaUsuario==true){
                      if (!this.usuario) this.errorMostrarMsjForm.push("El usuario del empleado no puede estar vacío."); 
                      if (!this.password_uno) this.errorMostrarMsjForm.push("La contraseña  del empleado no puede estar vacío.");                       
                      if(this.password_uno!=this.password_dos)this.errorMostrarMsjForm.push("Las contraseñas no son iguales.");
                }
                          
                if (this.errorMostrarMsjForm.length) this.errorForm = 1;

                return this.errorForm;
            },
            btnActivar(id){
                let me=this;
               Swal.fire({
                title: '<span style="font-size:25px">¿Estás seguro de activar al empleado?</span>',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, activar'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/empleado/activar',{
                    'id': id
                    }).then(function(response){
                        me.listarPaquete(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'Activado!',
                    'El empleado se ha activado con éxito',
                    'success'
                    )
                }
                });
            },
            btnDesactivar(id){
                let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Esta seguro de anular este ingreso?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, anular'
                }).then((result) => {
                if (result.value) {
                      axios.put(me.ruta+'/paquete/desactivar',{
                    'id': id
                    }).then(function(response){
                        me.listarPaquete(1,me.buscar,me.criterio);
                    }).catch(function(error){
                        console.log(error)
                    });
                    Swal.fire(
                    'ANULADO',
                    'El ingreso se ha anulado',
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
                this.usuario="";
                this.password_uno="";
                this.password_dos=""; 
                this.idrolSelect=0;
                this.idcargoSelect=0;

                this.vistaFormulario=false;
                this.lista=true;
                this.vistaUsuario=false;
            },
             abrirModal(modelo, accion, data = []){
               
                switch(modelo){
                    case "empleado":
                    {
                        switch(accion){
                            case 'registrar':
                            {   
                                this.selectCargo();       
                                this.vistaFormulario=true;
                                this.modal = 1;
                                this.tituloModal = 'Registrar Empleado';
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
                                this.botonUsuario=true; 
                                 
                    
                      
                                break;
                            }
                            case 'vista':
                            {
                                //console.log(data);
                                this.vistaDetalle=true;
                                this.modal=1;
                                this.tituloModal='Detalle de Empleado';
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
                                this.idcargo=data['idcargo'];  
                                this.idcargoSelect=data['idcargo'];  
                                this.cargo=data['cargo'];  
                                this.id_empleado=data['id'];               
                                this.btnDetalle();
                              
                                
                                                  
                                break;
                            }
                             case 'actualizar':
                            {
                                //console.log(data);
                                 this.selectCargo();       
                                this.vistaFormulario=true;
                                this.modal=1;
                                this.tituloModal='Actualizar Empleado';
                                this.tipoAccion=2;
                                 this.vistaDetalle=false;
                                 this.botonUsuario=false;
                                    
                                                             
                                
                                                  
                                break;
                            }
                        }
                    }
                }
            },    

        },
     
        mounted() {
             this.listarPaquete(1,this.buscar,this.criterio);
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
