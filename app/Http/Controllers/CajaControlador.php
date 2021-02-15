<?php

namespace App\Http\Controllers;
use App\Caja;
use App\DetalleCaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CajaControlador extends Controller
{
    public function index(Request $request)
    {
       // if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $caja = Caja::join('usuarios','caja.idempleado','=','usuarios.id')         
            ->select(
                'caja.id',
                'caja.fecha_hora_inicial',
                'caja.fecha_hora_final',
                'caja.inicial',
                'caja.final',
                'caja.estado',
                'usuarios.usuario')
            ->orderBy('caja.id', 'desc')->paginate(5);
        }
        else{
            $caja = Caja:: join('usuarios','caja.idempleado','=','usuarios.id')         
            ->select(
                'caja.id',
                'caja.fecha_hora_inicial',
                'caja.fecha_hora_final',
                'caja.incial',
                'caja.final',
                'caja.estado',
                'usuarios.usuario')
            ->where('caja.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('caja.id', 'desc')->paginate(5);
        }
        
        $abierta = Caja::where('estado', '=', '1')       
        ->select('id')->take(1)->get();
        

      
        return [
            'pagination' => [
                'total'        => $caja->total(),
                'current_page' => $caja->currentPage(),
                'per_page'     => $caja->perPage(),
                'last_page'    => $caja->lastPage(),
                'from'         => $caja->firstItem(),
                'to'           => $caja->lastItem(),
            ],
            'cajas' => $caja,
            'abierta' => $abierta,
        ];
    }
    public function detallecaja(Request $request)
    {
       // if (!$request->ajax()) return redirect('/');
            $id = $request->id;
            $detalle_caja = DetalleCaja::join('ventas','detalle_caja.idventa_salida','=','ventas.id')  
            ->join('personas','ventas.idempleado','=','personas.id')         
            ->select(
                'detalle_caja.id',
                'detalle_caja.idcaja',
                'detalle_caja.fecha_hora',
                'detalle_caja.monto',
                'detalle_caja.tipo',
                'detalle_caja.idventa_salida',
                'ventas.idempleado',
                'personas.nombres as empleado_as',
                'personas.apellidos as apellidos_as',                
                'detalle_caja.detalle')
            ->where('detalle_caja.idcaja','=',$id)
            ->orderBy('detalle_caja.id', 'desc')->get();
       

      
        return [
            'detalle_caja' => $detalle_caja           
        ];
    }
    public function cerrar(Request $request)
    {
         $rol= Caja::findOrFail($request->id);
         $rol->estado='0';
         $rol->save();
    }
    public function registrar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');

            $caja = new Caja();
          
            $caja->idempleado = \Auth::user()->id;
            $caja->inicial = $request->monto;
            $caja->final = $request->monto;          
            $caja->fecha_hora_inicial = $mytime->toDateString();
            $caja->fecha_hora_final = $mytime->toDateString();         
            $caja->estado = 1;
            $caja->save();
 
            DB::commit();
          
        } catch (Exception $e){
            DB::rollBack();
        }
    }
    
}
