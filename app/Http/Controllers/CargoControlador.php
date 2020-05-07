<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Roles;
use Illuminate\Http\Request;

class CargoControlador extends Controller
{
    //
    public function index(Request $request)
    {
        $cargos = Cargo::
            select(
                'id',
                'nombre',
                'descripcion','condicion')->get();

        return [  'cargos' => $cargos];
    }
    public function registrar(Request $request)
    {
        //almacenar
        $cargos=new Cargo();
        $cargos->nombre=$request->nombre;
        $cargos->descripcion=$request->descripcion;
        $cargos->condicion='1';
        $cargos->save();

    }
    public function actualizar(Request $request)
    {
         //actualizar
         $cargo= Cargo::findOrFail($request->id);
         $cargo->nombre=$request->nombre;
         $cargo->descripcion=$request->descripcion;
         $cargo->condicion='1';
         $cargo->save();
    }

    public function activar(Request $request)
    {
        $cargo= Cargo::findOrFail($request->id);
        $cargo->condicion='1';
        $cargo->save();
    }
    public function desactivar(Request $request)
    {
         $cargo= Cargo::findOrFail($request->id);
         $cargo->condicion='0';
         $cargo->save();
    }
    public function selectCargo(Request $request){
        if (!$request->ajax()) return redirect('/');
             $filtro = $request->filtro;
             $cargos = Cargo::where('condicion', '=', '1')       
             ->select('id','nombre')
             ->orderBy('id', 'asc')->get();
 
             return ['cargos' => $cargos];
     }
}
