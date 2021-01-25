<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ServicioControlador extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
            join('prestadores','servicios.idprestador','=','prestadores.id')->
            join('personas','prestadores.id','=','personas.id')->
            select(
                'servicios.id', 
                'servicios.nombre',
                'servicios.codigo',  
                'servicios.idprestador',                
                'personas.nombres as nombrePrestador',
                'servicios.descripcion', 
                'servicios.precio', 
                'servicios.condicion',
                'categorias.id as idcat',
                'categorias.nombre as categoria'
                
                )
            ->orderBy('servicios.id', 'asc')->paginate(10);
        }
        else if($criterio=='nombre' || $criterio=='precio'  || $criterio=='descripcion'){
                $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
                select(
                    'servicios.id', 
                    'servicios.nombre',
                    'servicios.codigo',
                    'servicios.idprestador',
                    'servicios.descripcion', 
                    'servicios.precio', 
                    'servicios.condicion',
                    'categorias.id as idcat',
                    'categorias.nombre as categoria')
                ->where('servicios.'.$criterio, 'like', '%'. $buscar . '%')
                ->orderBy('id', 'asc')->paginate(10);

            }
            else if( $criterio=='categoria'){
                $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
                select(
                    'servicios.id', 
                    'servicios.nombre',
                    'servicios.codigo',
                    'servicios.idprestador',
                    'servicios.descripcion', 
                    'servicios.precio', 
                    'servicios.condicion',

                    'categorias.id as idcat',
                    'categorias.nombre as categoria')
                ->where('categorias.nombre', 'like', '%'. $buscar . '%')
                ->orderBy('id', 'asc')->paginate(10);

            }
        
         
        return [
            'pagination' => [
                'total'        => $servicios->total(),
                'current_page' => $servicios->currentPage(),
                'per_page'     => $servicios->perPage(),
                'last_page'    => $servicios->lastPage(),
                'from'         => $servicios->firstItem(),
                'to'           => $servicios->lastItem(),
            ],
            'servicios' => $servicios
        ];
    



    } 
    public function ultimoservicio(Request $request){
        
        $ultimo=Servicio::select(
        'servicios.id')
        ->orderBy('servicios.id', 'desc')
        ->take(1)->get();      

        return[
            'idultimoservicio'=> $ultimo
        ];
    }

    public function buscarServicioVenta(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $servicios = Servicio::where('codigo','=', $filtro)
        ->select('id','codigo','nombre','precio')
        ->where('condicion','=','1')
        ->orderBy('nombre', 'asc')
        ->take(1)->get();

        return ['servicios' => $servicios];
    }
    public function listarServicio(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
            join('prestadores','servicios.idprestador','=','prestadores.id')->
            join('personas','prestadores.id','=','personas.id')->
            select(
                'servicios.id', 
                'servicios.nombre',
                'servicios.codigo',  
                'servicios.idprestador',                
                'personas.nombres as nombrePrestador',
                'servicios.descripcion', 
                'servicios.precio', 
                'servicios.condicion',
                'categorias.id as idcat',
                'categorias.nombre as categoria'
                
                )->orderBy('servicios.id', 'desc')->paginate(10);
        }
        else{
            $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
            join('prestadores','servicios.idprestador','=','prestadores.id')->
            join('personas','prestadores.id','=','personas.id')->
            select(
                'servicios.id', 
                'servicios.nombre',
                'servicios.codigo',  
                'servicios.idprestador',                
                'personas.nombres as nombrePrestador',
                'servicios.descripcion', 
                'servicios.precio', 
                'servicios.condicion',
                'categorias.id as idcat',
                'categorias.nombre as categoria'
                
                ) ->where('servicios.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('servicios.id', 'desc')->paginate(10);
        }
        

        return ['servicios' => $servicios];
    }
    public function listarServiciosVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
            join('prestadores','servicios.idprestador','=','prestadores.id')->
            join('personas','prestadores.id','=','personas.id')->
            select(
                'servicios.id', 
                'servicios.nombre',
                'servicios.codigo',  
                'servicios.idprestador',                
                'personas.nombres as nombrePrestador',
                'servicios.descripcion', 
                'servicios.precio', 
                'servicios.condicion',
                'categorias.id as idcat',
                'categorias.nombre as categoria' )
                ->where('servicios.condicion','=','1')
            ->orderBy('servicios.id', 'desc')->paginate(10);
        }
        else{
            $servicios = Servicio::join('categorias','servicios.idcategoria','=','categorias.id')->
            join('prestadores','servicios.idprestador','=','prestadores.id')->
            join('personas','prestadores.id','=','personas.id')->
            select(
                'servicios.id', 
                'servicios.nombre',
                'servicios.codigo',  
                'servicios.idprestador',                
                'personas.nombres as nombrePrestador',
                'servicios.descripcion', 
                'servicios.precio', 
                'servicios.condicion',
                'categorias.id as idcat',
                'categorias.nombre as categoria'
                
                )->where('servicios.'.$criterio, 'like', '%'. $buscar . '%')
                ->where('servicios.condicion','=','1')
            ->orderBy('servicios.id', 'desc')->paginate(10);
        }
        

        return ['servicios' => $servicios];
    }
    
    public function registrar(Request $request)
    {
        //almacenar
        $categoria=new Servicio();
        $categoria->codigo=$request->codigo;
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->idprestador=$request->idprestador;
        $categoria->idcategoria=$request->idcategoria;
        $categoria->precio=$request->precio;
        $categoria->condicion='1';
        $categoria->save();

    }
  
    public function actualizar(Request $request)
    {
         //actualizar
         $categoria= Servicio::findOrFail($request->id);
         $categoria->nombre=$request->nombre;
         $categoria->descripcion=$request->descripcion;
         $categoria->idprestador=$request->idprestador;
         $categoria->idcategoria=$request->idcategoria;
         $categoria->precio=$request->precio;
         $categoria->condicion='1';
         $categoria->save();
    }

    public function activar(Request $request)
    {
        $categoria= Servicio::findOrFail($request->id);
        $categoria->condicion='1';
        $categoria->save();
    }
    public function desactivar(Request $request)
    {
         $categoria= Servicio::findOrFail($request->id);
         $categoria->condicion='0';
         $categoria->save();
    }
}
