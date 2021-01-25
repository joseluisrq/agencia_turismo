<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Paquetes
                        <button type="button" @click="mostrarDetalle()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                      
                    </div>
                    <!-- Listado-->
                    <template v-if="listado==1">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-12" v-model="criterio">
                                      <option value="codigo_paquete">Codigo </option>
                                      <option value="nombre_paquete">Nombre </option>
                                      <option value="total">Precio</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPaquetes(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarPaquetes(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                       
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                         <th>Registrador por</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="detallepaq in arrayDetallePaquete" :key="detallepaq.id">
                                        <td>
                                            <button type="button" @click="VerDetallePaquete(detallepaq.id)" class="btn btn-outline-success ">
                                            <i class="fas fa-eye"></i>
                                            </button>
                                            <template >
                                                <button type="button" @click="pdfTicket(detallepaq.id)" class="btn btn-outline-warning ">
                                               <i class="far fa-file-pdf"></i>
                                                </button> 
                                            </template>
                                                                                    
                                            <template v-if="detallepaq.estado==1">
                                                <button type="button" class="btn btn-outline-danger " @click="desactivarPaquete(detallepaq.id)">
                                                   <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="detallepaq.codigo_paquete"></td>
                                        <td v-text="detallepaq.nombre_paquete"></td>
                                      
                                        <td v-text="detallepaq.total"></td>
                                        <td v-text="detallepaq.fecha_hora"></td>
                                        <td v-text="detallepaq.nombres"></td>
                                        <template v-if="detallepaq.estado==1">
                                           <td >Activo</td>
                                        </template>
                                         <template v-else>
                                           <td >Desactivado</td>
                                        </template>
                                       
                                      
                                      
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    </template>
                    <!--Fin Listado-->
                    <!-- Detalle-->
                    <template v-else-if="listado==0">
                    <div class="card-body">
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" v-model="nombre_paq">
                        </div>
                           <div class="col-md-6">
                            <label for="">Detalle</label>
                            <input type="text" class="form-control" v-model="descrip_paq">
                        </div>
                        <hr>
                        
                        <div class="form-group row border">
                            <div class="col-md-12">
                                <div v-show="errorRegistroPaq" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjRegistroPaquete" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Servicio </label>
                                    <div class="form-inline">
                                        <button @click="abrirModal()" class="btn btn-outline-warning col-md-4"><span style="color:red;" v-show="idarticulo==0">*Seleccione servicios</span></button>
                                      
                                    </div>                                    
                                </div>
                            </div>                         
                      
                           
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Servicio</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Descuento</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                            <td>
                                                <button @click="eliminarDetalle(index)" type="button" class="btn btn-outline-danger ">
                                                 <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                            <td v-text="detalle.articulo">
                                            </td>
                                            <td>
                                                <input v-model="detalle.precio" type="number" class="form-control">
                                            </td>
                                            <td>
                                             
                                                <input v-model="detalle.cantidad" type="number" class="form-control">
                                            </td>
                                            <td>
                                                <span style="color:red;" v-show="detalle.descuento>(detalle.precio*detalle.cantidad)">Descuento superior</span>
                                                <input v-model="detalle.descuento" type="number" class="form-control">
                                            </td>
                                            <td>
                                                {{detalle.precio*detalle.cantidad-detalle.descuento}}
                                            </td>
                                        </tr>
                                      
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="5" align="right"><strong>Total Neto:</strong></td>
                                            <td>S/ {{total=calcularTotal}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="6">
                                                No hay servicios agregados
                                            </td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                                <button type="button" class="btn btn-primary" @click="registrarVenta()">Registrar Paquete</button>
                            </div>
                        </div>
                    </div>
                    </template>
                    <!-- Fin Detalle-->
                    <!-- Ver ingreso -->
                    <template v-else-if="listado==2">
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Codigo </label>
                                    <p v-text="codigo_paquete"></p>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre </label>
                                    <p v-text="nombre_paquete"></p>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripción del paquete </label>
                                    <p v-text="detalle"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha</label>
                                    <p v-text="fecha_hora"></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Precio</label>
                                <p v-text="total"></p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Registrado por</label>
                                    <p v-text="nombres_registrador"></p>
                                </div>
                            </div>
                       
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Descuento</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="detalle in arrayDetalle" :key="detalle.id">
                                            <td v-text="detalle.servicio">
                                            </td>
                                            <td v-text="detalle.precio">
                                            </td>
                                            <td v-text="detalle.cantidad">
                                            </td>
                                            <td v-text="detalle.descuento">
                                            </td>
                                            <td>
                                                {{detalle.precio*detalle.cantidad-detalle.descuento}}
                                            </td>
                                        </tr>
                                       
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4"  align="right"><strong>Total Neto:</strong></td>
                                            <td>S/ {{total}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="5">
                                               Sin servicios agregados
                                            </td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-secondary">Cerrar</button>
                                
                            </div>
                        </div>
                    </div>
                    </template>
                    <!-- fin ver ingreso -->
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select class="form-control col-md-12" v-model="criterioA">
                                        <option value="nombre">Nombre</option>
                                        <option value="descripcion">Descripción</option>
                                        <option value="codigo">Código</option>
                                        </select>
                                        <input type="text" v-model="buscarA" @keyup.enter="listarArticulo(buscarA,criterioA)" class="form-control" placeholder="Texto a buscar">
                                        <button type="submit" @click="listarArticulo(buscarA,criterioA)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Precio</th>                                   
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="servicio in arrayServicio" :key="servicio.id">
                                            <td>
                                                <button type="button" @click="agregarDetalleModal(servicio)" class="btn btn-success btn-sm">
                                               <i class="far fa-check-circle"></i>
                                                </button>
                                            </td>
                                            <td v-text="servicio.codigo"></td>
                                            <td v-text="servicio.nombre"></td>
                                            <td v-text="servicio.categoria"></td>
                                            <td v-text="servicio.precio"></td>
                                          
                                         
                                        </tr>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPersona()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        props : ['ruta'],
        data (){
            return {
                venta_id: 0,
                idcliente:0,
                cliente:'',
                fecha_hora:'',
             
                serie_comprobante : '',
                num_comprobante : '',
                impuesto: 0.18,
                total:0.0,
                totalImpuesto: 0.0,
                totalParcial: 0.0,
                arrayDetallePaquete : [],
                arrayCliente: [],
                arrayDetalle : [],
                listado:1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorRegistroPaq : 0,
                errorMostrarMsjRegistroPaquete : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'num_comprobante',
                buscar : '',
                criterioA:'nombre',
                buscarA: '',
                arrayServicio: [],
                idarticulo: 0,
                codigo: '',
                articulo: '',
                precio: 0,
                cantidad:0,
                descuento: 0,
                stock:0,
                nombre_paq:'',
                descrip_paq:'',

                codigo_paquete:'',
                nombre_paquete:'',  
                detalle:'',  
                nombres_registrador:'',
                codigospaquete:''
            }
        },
        components: {
            vSelect
        },
        computed:{
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
            },
            calcularTotal: function(){
                var resultado=0.0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    resultado=resultado+(this.arrayDetalle[i].precio*this.arrayDetalle[i].cantidad-this.arrayDetalle[i].descuento)
                }
                return resultado;
            }
        },
        methods : {
            listarPaquetes (page,buscar,criterio){
                let me=this;
                var url= this.ruta + '/paquete?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayDetallePaquete = respuesta.paquetes.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });

          


            },
            cargarPdf(){
                window.open(this.ruta + '/paquete/listarPdf','_blank');
            },
          
        
            pdfTicket(id){
                window.open(this.ruta + '/paquete/pdfTicket/'+ id + ',' + '_blank');
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarPaquetes(page,buscar,criterio);
            },
            encuentra(id){
                var sw=0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    if(this.arrayDetalle[i].idarticulo==id){
                        sw=true;
                    }
                }
                return sw;
            },
            eliminarDetalle(index){
                let me = this;
                me.arrayDetalle.splice(index, 1);
            },
            agregarDetalle(){
                let me=this;
                if(me.idarticulo==0 || me.cantidad==0 || me.precio==0){
                }
                else{
                    if(me.encuentra(me.idarticulo)){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ese servicio ya se encuentra agregado!',
                            })
                    }
                    else{
                       if(me.cantidad>me.stock){
                           swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'NO hay stock disponible!',
                            })
                       } 
                       else{
                           me.arrayDetalle.push({
                                idarticulo: me.idarticulo,
                                articulo: me.articulo,
                                cantidad: me.cantidad,
                                precio: me.precio,
                                descuento: me.descuento,
                                stock: me.stock
                            });
                            me.codigo="";
                            me.idarticulo=0;
                            me.articulo="";
                            me.cantidad=0;
                            me.precio=0;
                            me.descuento=0;
                            me.stock=0
                       }
                    }
                    
                }

                

            },
            agregarDetalleModal(data =[]){
                let me=this;
                if(me.encuentra(data['id'])){
                      Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El servicio ya se encuentra agregado'
                       
                            })
                    }
                    else{
                       me.arrayDetalle.push({
                            idarticulo: data['id'],
                            articulo: data['nombre'],
                            cantidad: 1,
                            precio: data['precio'],
                            descuento:0,
                            stock:data['stock']
                        }); 
                    }
            },
            listarArticulo (buscar,criterio){
                let me=this;
                var url= this.ruta + '/servicio/listarServiciosVenta?buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayServicio = respuesta.servicios.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            registrarVenta(){              
                 
                if (this.ValidarPaquete()){
                   
                    return;
                }
                  let me = this;
               
                   axios.post(this.ruta + '/paquete/registrar',{
                    'nombre_paquete': this.nombre_paq,
                    'detalle': this.descrip_paq,                 
                    'impuesto' : this.impuesto,
                    'total' : this.total,
                    'data': this.arrayDetalle,
                    'codigo_paquete': this.codigospaquete

                }).then(function (response) {
                     me.listado=1;
                    me.listarPaquetes(1,'','id');
                 
                   
                    me.codigospaquete='';                
                    me.impuesto=0.18;
                    me.total=0.0;
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.precio=0;
                    me.stock=0;
                    me.codigo='';
                    me.descuento=0;
                    me.arrayDetalle=[];
                  

                }).catch(function (error) {
                    console.log(error);
                });
            },
            ValidarPaquete(){
                let me=this;
                me.errorRegistroPaq=0;
                me.errorMostrarMsjRegistroPaquete =[];
                var art;
                
            
                if (!me.nombre_paq) me.errorMostrarMsjRegistroPaquete.push("Ingrese el nombre ");
                if (!me.descrip_paq) me.errorMostrarMsjRegistroPaquete.push("Ingrese el ingrese el detalle");
                 if (this.arrayDetalle.length<=0) this.errorMostrarMsjRegistroPaquete.push("Registre servicios");

              

                if (me.errorMostrarMsjRegistroPaquete.length) me.errorRegistroPaq = 1;

                return me.errorRegistroPaq;
            },
            mostrarDetalle(){
                let me=this;
                 me.Codigo();
                me.listado=0;

                me.idproveedor=0;
            
                me.serie_comprobante='';
                me.num_comprobante='';
                me.impuesto=0.18;
                me.total=0.0;
                me.idarticulo=0;
                me.articulo='';
                me.cantidad=0;
                me.precio=0;
                me.arrayDetalle=[];

               
            },
            ocultarDetalle(){
                this.listado=1;
            },
              Codigo(){
                let me=this;
                 let idserviciou=0;
                var url= this.ruta+'/paquete/ultimopaquete';               
                axios.get(url).then(function (response) {
                let respuesta= response.data;
                if(response.length==0){
                    idserviciou=1;
                }else{
                    idserviciou= respuesta.idultimopaquete[0].id;
                }
               
                me.codigospaquete='P-'+me.zfill(idserviciou,3);
                 
                
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
              zfill(number, width) {
                var numberOutput = Math.abs(number); /* Valor absoluto del número */
                var length = number.toString().length; /* Largo del número */ 
                var zero = "0"; /* String de cero */  

                if (width <= length) {
                    if (number < 0) {
                            return ("-" + numberOutput.toString()); 
                    } else {
                            return numberOutput.toString(); 
                    }
                } else {
                    if (number < 0) {
                        return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
                    } else {
                        return ((zero.repeat(width - length)) + numberOutput.toString()); 
                    }
                }
            },
            VerDetallePaquete(id){
                let me=this;
                me.listado=2;
                
                //Obtener los datos del ingreso
                var arrayDetallePaqueteT=[];            
                var url= this.ruta + '/paquete/obtenerCabecera?id=' + id;
                
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayDetallePaqueteT = respuesta.paqueteselecionado;               
                  
                    me.codigo_paquete=arrayDetallePaqueteT[0]['codigo_paquete'];
                    me.nombre_paquete=arrayDetallePaqueteT[0]['nombre_paquete'];
                    me.detalle=arrayDetallePaqueteT[0]['detalle'];
                    me.impuesto=arrayDetallePaqueteT[0]['impuesto'];
                    me.total=arrayDetallePaqueteT[0]['total'];
                    me.fecha_hora = arrayDetallePaqueteT[0]['fecha_hora'];
                     me.nombres_registrador = arrayDetallePaqueteT[0]['nombres'];
                  
                })
                .catch(function (error) {
                    console.log(error);
                });

                //Obtener los datos de los detalles 
                var urld= this.ruta + '/paquete/obtenerDetalles?id=' + id;
                
                axios.get(urld).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayDetalle = respuesta.detalles;
                })
                .catch(function (error) {
                    console.log(error);
                });               
            },
        
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            }, 
            abrirModal(){               
                this.arrayServicio=[];
                this.modal = 1;
                this.tituloModal = 'Seleccione uno o varios servicios';
            },
            desactivarPaquete(id){
                 let me=this;
               Swal.fire({             
                title: '<span style="font-size:25px">¿Estás seguro de desactivar el paquete?</span>',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, desactivar'
                }).then((result) => {
                if (result.value) {
                      axios.put(this.ruta + '/paquete/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPaquetes(1,'','id');
                        swal(
                        'Desactivado!',
                        'El paquete se ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    Swal.fire(
                    '¡Desactivado!',
                    'El empleado se ha desactivado con éxito',
                    'success'
                    )
                }
                })
             /*  swal({
                title: 'Esta seguro de anular esta venta?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                   
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) */
        },
            },
        mounted() {
            this.listarPaquetes(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }

</style>
