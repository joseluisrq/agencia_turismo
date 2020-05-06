<?php

namespace App\Http\Controllers;

use App\Prestador;
use App\Persona;
use Illuminate\Http\Request;

class PrestadorControlador extends Controller
{
    //
   
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $prestadores = Prestador::
            join('personas','prestadores.id','=','personas.id')
            ->select(
                'personas.id',         
                'personas.nombres',
                'personas.apellidos',
                'personas.dni',
                'personas.tipo_documento',            
                'personas.direccion',
                'personas.ciudad',
                'personas.pais',
                'personas.telefono',
                'personas.email',
                'personas.sexo',
                'prestadores.condicion')
            ->orderBy('prestadores.id', 'asc')->paginate(10);
        }
        else if($criterio=='nombres' || $criterio=='apellidos'|| $criterio=='dni'|| $criterio=='ciudad'|| $criterio=='pais'
        || $criterio=='telefono'|| $criterio=='email'){
            $prestadores = Prestador::
            join('personas','prestadores.id','=','personas.id')
            ->select(
                'personas.id',
                'personas.dni',
                'personas.nombres',
                'personas.apellidos',
                'personas.tipo_documento',            
                'personas.direccion',
                'personas.ciudad',
                'personas.pais',
                'personas.telefono',
                'personas.email',
                'personas.sexo',
                'prestadores.condicion')
                ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
                ->orderBy('prestadores.id', 'asc')->paginate(10);

            }
        
        
        return [
            'pagination' => [
                'total'        => $prestadores->total(),
                'current_page' => $prestadores->currentPage(),
                'per_page'     => $prestadores->perPage(),
                'last_page'    => $prestadores->lastPage(),
                'from'         => $prestadores->firstItem(),
                'to'           => $prestadores->lastItem(),
            ],
            'prestadores' => $prestadores
        ];
    }
    public function selectPrestador(Request $request){
    //   if (!$request->ajax()) return redirect('/');
            $filtro = $request->filtro;
            $prestadores = Prestador::
            join('personas','prestadores.id','=','personas.id')
            ->select('personas.id as id','personas.nombres as nombre', 'personas.apellidos as apellido', 'prestadores.empresa')
            ->where('prestadores.condicion', '=', '1')     
            ->orderBy('id', 'asc')->get();

            return ['prestadores' => $prestadores];
    }
    

    public function activar(Request $request)
    {
        $categoria= Prestador::findOrFail($request->id);
        $categoria->condicion='1';
        $categoria->save();
    }
    public function desactivar(Request $request)
    {
         $categoria= Prestador::findOrFail($request->id);
         $categoria->condicion='0';
         $categoria->save();
    }
    public function actualizar(Request $request)
    {
         //actualizar
         $persona= Persona::findOrFail($request->id);
         $persona->nombres=$request->nombres;
         $persona->apellidos=$request->apellidos;
         $persona->tipo_documento=$request->tipo_documento;
         $persona->dni=$request->dni;
         $persona->direccion=$request->direccion;
         $persona->ciudad=$request->ciudad;
         $persona->pais=$request->pais;
         $persona->telefono=$request->telefono;
         $persona->email=$request->email;
         $persona->sexo=$request->sexo;
         $persona->save();

         $empleado= Prestador::findOrFail($request->id);
         $empleado->condicion='1';
         $empleado->save();
         
        
    }
    
}
