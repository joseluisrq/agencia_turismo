<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\DetallePaquete;
use App\DetalleCliente;


class PaqueteControlador extends Controller
{
    //
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $paquetes = Paquete::join('empleados','paquetes.idempleado','=','empleados.id')
            ->join('personas','empleados.id','=','personas.id')
            ->join('usuarios','empleados.id','=','usuarios.id')
            ->select(
                'paquetes.id',
                'paquetes.tipo_comprobante',
                'paquetes.serie_comprobante',
                'paquetes.num_comprobante',
                'paquetes.fecha_hora',
                'paquetes.impuesto',
                'paquetes.total',
                'paquetes.estado',
                'personas.nombres','usuarios.usuario')
            ->orderBy('paquetes.id', 'desc')->paginate(3);
        }
        else{
            $paquetes = Paquete::join('empleados','paquetes.idempleado','=','empleados.id')
            ->join('personas','empleados.id','=','personas.id')
            ->join('usuarios','empleados.id','=','usuarios.id')
            ->select(
                'paquetes.id',
                'paquetes.tipo_comprobante',
                'paquetes.serie_comprobante',
                'paquetes.num_comprobante',
                'paquetes.fecha_hora',
                'paquetes.impuesto',
                'paquetes.total',
                'paquetes.estado',
                'personas.nombres','usuarios.usuario')
            ->where('paquetes.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('paquetes.id', 'desc')->paginate(3);
        }
        
        return [
            'pagination' => [
                'total'        => $paquetes->total(),
                'current_page' => $paquetes->currentPage(),
                'per_page'     => $paquetes->perPage(),
                'last_page'    => $paquetes->lastPage(),
                'from'         => $paquetes->firstItem(),
                'to'           => $paquetes->lastItem(),
            ],
            'paquetes' => $paquetes
        ];
    }
    public function obtenerCabecera(Request $request){
      //  if (!$request->ajax()) return redirect('/');

        $id = $request->id;
        $venta = Paquete::join('empleados','paquetes.idempleado','=','empleados.id')
        ->join('personas','empleados.id','=','personas.id')
        ->join('usuarios','empleados.id','=','usuarios.id')
        ->select(
            'paquetes.id',
            'paquetes.tipo_comprobante',
            'paquetes.serie_comprobante',
            'paquetes.num_comprobante',
            'paquetes.fecha_hora',
            'paquetes.impuesto',
            'paquetes.total',
            'paquetes.estado',
            'personas.nombres',
            'personas.apellidos','usuarios.usuario')
        ->where('paquetes.id','=',$id)
        ->orderBy('paquetes.id', 'desc')->take(1)->get();

        $clientes = DetalleCliente::
        join('clientes','detalle_clientes.idcliente','=','clientes.id')
        ->join('personas','clientes.id','=','personas.id')
        ->select(
            'personas.nombres',
            'personas.tipo_documento',
            'personas.dni',
            'personas.direccion',
            'personas.telefono',
            'personas.email',
            'personas.apellidos'
        )
        ->where('detalle_clientes.idpaquete','=',$id)
        ->where('detalle_clientes.responsable','=','1')
        ->orderBy('detalle_clientes.id', 'desc')->take(1)->get();

        
        return ['venta' => $venta,'clientes' => $clientes];
    }
    public function obtenerCabeceraCli(Request $request){
        //  if (!$request->ajax()) return redirect('/');
  
          $id = $request->id;
       
          $clientes = DetalleCliente::
          join('clientes','detalle_clientes.idcliente','=','clientes.id')
          ->join('personas','clientes.id','=','personas.id')
          ->select(
              'personas.nombres',
              'personas.tipo_documento',
              'personas.dni',
              'personas.direccion',
              'personas.telefono',
              'personas.email',
              'personas.apellidos'
          )
          ->where('detalle_clientes.idpaquete','=',$id)
          ->where('detalle_clientes.responsable','=','1')
          ->orderBy('detalle_clientes.id', 'desc')->take(1)->get();
  
          
          return ['clientes' => $clientes];
      }
    public function obtenerDetalles(Request $request){
       // if (!$request->ajax()) return redirect('/');
        $id=1;
        //$id = $request->id;
        $detalles = DetallePaquete::
        join('servicios','detalle_paquete.idservicio','=','servicios.id')
        ->join('categorias','servicios.idcategoria','=','categorias.id')
        ->select(
            'detalle_paquete.id',
            'detalle_paquete.cantidad',
            'detalle_paquete.precio',
            'detalle_paquete.descuento',
            'categorias.nombre as categoriaservicio',
            'servicios.nombre as servicio'
        )
        ->where('detalle_paquete.idpaquete','=',$id)
        ->orderBy('detalle_paquete.id', 'desc')->get();
        
        return ['detalles' => $detalles];
    }
    public function obtenerClientes(Request $request){
        // if (!$request->ajax()) return redirect('/');
         $id=1;
         //$id = $request->id;
         $clientes = DetalleCliente::
         join('clientes','detalle_clientes.idcliente','=','clientes.id')
         ->join('personas','clientes.id','=','personas.id')
         ->select(
            'detalle_clientes.id',
             'detalle_clientes.responsable',
             'personas.nombres',
             'personas.apellidos'            
            
         )
         ->where('detalle_clientes.idpaquete','=',$id)
         ->orderBy('detalle_clientes.id', 'desc')->get();
         
         return ['clientes' => $clientes];
     }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');

            $paquete = new Paquete();           
            $paquete->idempleado = \Auth::user()->id;
            $paquete->tipo_comprobante = $request->tipo_comprobante;
            $paquete->serie_comprobante = $request->serie_comprobante;
            $paquete->num_comprobante = $request->num_comprobante;
            $paquete->fecha_hora = $mytime->toDateString();
            $paquete->impuesto = $request->impuesto;
            $paquete->total = $request->total;
            $paquete->estado = 'Registrado';
            $paquete->save();

            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos

            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetallePaquete();
                $detalle->idpaquete = $paquete->id;
                $detalle->idservicio = $det['idservicio'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];
                $detalle->descuento = $det['descuento'];         
                $detalle->save();
            }     
            
          //  $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos

         /*   foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleCliente();
                $detalle->idventa = $venta->id;
                $detalle->idarticulo = $det['idarticulo'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->precio = $det['precio'];
                $detalle->descuento = $det['descuento'];         
                $detalle->save();
            }         */

            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
        }
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Paquete::findOrFail($request->id);
        $venta->estado = 'Anulado';
        $venta->save();
    }

    public function listarPdf(){
        $ventas = Paquete::join('empleados','paquetes.idempleado','=','empleados.id')
        ->join('personas','empleados.id','=','personas.id')
        ->join('usuarios','empleados.id','=','usuarios.id')
        ->select(
            'paquetes.id',
            'paquetes.tipo_comprobante',
            'paquetes.serie_comprobante',
            'paquetes.num_comprobante',
            'paquetes.fecha_hora',
            'paquetes.impuesto',
            'paquetes.total',
            'paquetes.estado',
            'personas.nombres',
            'personas.apellidos','usuarios.usuario')
            ->orderBy('paquetes.id', 'desc')->get();

         

        $cont=Paquete::count();

        $pdf = \PDF::loadView('pdf.ventaspdf',
        ['ventas'=>$ventas,'cont'=>$cont])->setPaper('a4', 'landscape');
        return $pdf->download('ventas.pdf');
    }

    public function pdf(Request $request,$id){
        $venta = Paquete::join('empleados','paquetes.idempleado','=','empleados.id')
        ->join('personas','empleados.id','=','personas.id')
        ->join('usuarios','empleados.id','=','usuarios.id')
        ->select(
            'paquetes.id',
            'paquetes.created_at',
            'paquetes.tipo_comprobante',
            'paquetes.serie_comprobante',
            'paquetes.num_comprobante',
            'paquetes.fecha_hora',
            'paquetes.impuesto',
            'paquetes.total',
            'paquetes.estado',
            'personas.nombres as nombreuser',           
            'personas.apellidos as apellidosuser','usuarios.usuario')
        ->where('paquetes.id','=',$id)
        ->orderBy('paquetes.id', 'desc')->take(1)->get();

        $clientes = DetalleCliente::
        join('clientes','detalle_clientes.idcliente','=','clientes.id')
        ->join('personas','clientes.id','=','personas.id')
        ->select(
            'personas.nombres',
            'personas.tipo_documento',
            'personas.dni',
            'personas.direccion',
            'personas.telefono',
            'personas.email',
            'personas.apellidos'
        )
        ->where('detalle_clientes.idpaquete','=',$id)
        ->where('detalle_clientes.responsable','=','1')
        ->orderBy('detalle_clientes.id', 'desc')->take(1)->get();

        $detalles = DetallePaquete::
        join('servicios','detalle_paquete.idservicio','=','servicios.id')
        ->join('categorias','servicios.idcategoria','=','categorias.id')
        ->select(
            'detalle_paquete.id',
            'detalle_paquete.cantidad',
            'detalle_paquete.precio',
            'detalle_paquete.descuento',
            'categorias.nombre as categoriaservicio',
            'servicios.nombre as servicio'
        )
        ->where('detalle_paquete.idpaquete','=',$id)
        ->orderBy('detalle_paquete.id', 'desc')->get();

       $numventa=Paquete::select('num_comprobante')->where('id',$id)->get();

       $pdf = \PDF::loadView('pdf.venta',['venta'=>$venta,'clientes'=>$clientes,'detalles'=>$detalles]);
        return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');
       // return ['venta'=>$venta,'detallesCliente'=>$detallesCliente,'detalles'=>$detalles];
    }



    public function pdfTicket(Request $request,$id){
        $venta = Paquete::join('personas','ventas.idcliente','=','personas.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.tipo_comprobante','ventas.serie_comprobante',
        'ventas.num_comprobante','ventas.created_at','ventas.impuesto','ventas.total',
        'ventas.estado','personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','users.usuario')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id', 'desc')->take(1)->get();

        $detalles = DetallePaquete::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento',
        'articulos.nombre as articulo')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id', 'desc')->get();

        $numventa=Paquete::select('num_comprobante')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.ventaticket',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->download('ventaTicket-'.$numventa[0]->num_comprobante.'.pdf');
    }
}
