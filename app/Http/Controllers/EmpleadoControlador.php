<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoControlador extends Controller
{
   
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $empleados = Empleado::
            join('personas','empleados.id','=','personas.id')
            ->join('cargos','empleados.idcargo','=','cargos.id')
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
                'empleados.condicion',
                'empleados.idcargo',
                'cargos.nombre as cargo')
            ->orderBy('empleados.id', 'asc')->paginate(10);
        }
        else if($criterio=='nombres' || $criterio=='apellidos'|| $criterio=='dni'|| $criterio=='ciudad'|| $criterio=='pais'
        || $criterio=='telefono'|| $criterio=='email'){
            $empleados = Empleado::
            join('personas','empleados.id','=','personas.id')
            ->join('cargos','empleados.idcargo','=','cargos.id')
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
                'empleados.condicion',
                'empleados.idcargo',
                'cargos.nombre as cargo')
                ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
                ->orderBy('empleados.id', 'asc')->paginate(10);

            }
        
        
        return [
            'pagination' => [
                'total'        => $empleados->total(),
                'current_page' => $empleados->currentPage(),
                'per_page'     => $empleados->perPage(),
                'last_page'    => $empleados->lastPage(),
                'from'         => $empleados->firstItem(),
                'to'           => $empleados->lastItem(),
            ],
            'empleados' => $empleados
        ];
    }
    public function selectEmpleado(Request $request){
      
           
             $empleados =  Empleado::
             join('personas','empleados.id','=','personas.id')
             ->join('cargos','empleados.idcargo','=','cargos.id')
             ->select(
                 'personas.id',
                 'personas.nombres',
                 'personas.apellidos') 
                ->where('empleados.condicion' ,'=', '1')
                ->orderBy('empleados.id', 'asc')->get();
 
             return ['empleados' => $empleados];
     }
    public function registrar(Request $request)
    {
        //almacenar
      
        try{
            DB::beginTransaction(); //utlizamos transaccion
            $persona=new Persona();
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
 
            $empleado = new Empleado();
            $empleado->condicion = '1';
            $empleado->idcargo = $request->idcargo;
         
            
            $empleado->id = $persona->id;
            $empleado->save();
 
            DB::commit();
 
        } catch (\Exception $e){
            DB::rollBack(); //DESACER TODO SI HUBIER ALAGUN ERROR
        }

 

    }
    public function activar(Request $request)
    {
        $empleado= Empleado::findOrFail($request->id);
        $empleado->condicion='1';
        $empleado->save();
    }
    public function desactivar(Request $request)
    {
         $empleado= Empleado::findOrFail($request->id);
         $empleado->condicion='0';
         $empleado->save();
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

         $empleado= Empleado::findOrFail($request->id);
         $empleado->condicion='1';
         $empleado->save();
         
        
    }

}
