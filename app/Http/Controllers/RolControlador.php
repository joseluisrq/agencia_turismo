<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolControlador extends Controller
{
    //
    public function index(Request $request)
    {
        $roles = Roles::
            select(
                'id',
                'nombre',
                'descripcion','condicion')->get();

        return [  'roles' => $roles];
    }
    public function registrar(Request $request)
    {
        //almacenar
        $rol=new Roles();
        $rol->nombre=$request->nombre;
        $rol->descripcion=$request->descripcion;
        $rol->condicion='1';
        $rol->save();

    }
    public function actualizar(Request $request)
    {
         //actualizar
         $rol= Roles::findOrFail($request->id);
         $rol->nombre=$request->nombre;
         $rol->descripcion=$request->descripcion;
         $rol->condicion='1';
         $rol->save();
    }

    public function activar(Request $request)
    {
        $rol= Roles::findOrFail($request->id);
        $rol->condicion='1';
        $rol->save();
    }
    public function desactivar(Request $request)
    {
         $rol= Roles::findOrFail($request->id);
         $rol->condicion='0';
         $rol->save();
    }
    public function selectRol(Request $request){
        if (!$request->ajax()) return redirect('/');
             $filtro = $request->filtro;
             $roles = Roles::where('condicion', '=', '1')       
             ->select('id','nombre')
             ->orderBy('id', 'asc')->get();
 
             return ['roles' => $roles];
     }
}
