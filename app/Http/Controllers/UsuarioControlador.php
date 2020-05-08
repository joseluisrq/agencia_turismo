<?php

namespace App\Http\Controllers;
use App\Empleado;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UsuarioControlador extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $usuarios = User::
             join('empleados','usuarios.id','=','empleados.id')
            ->join('personas','empleados.id','=','personas.id')
            ->join('roles','usuarios.idrol','=','roles.id')
            ->select(
                'personas.id as idpersona',         
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
                'empleados.condicion as condicionempleado',
                'usuarios.condicion as condicionusuario',
                'usuarios.usuario',
                'usuarios.password',
                'usuarios.idrol',
                'roles.nombre as rol')
            ->orderBy('usuarios.id', 'asc')->paginate(10);
        }
        else if($criterio=='nombres' || $criterio=='apellidos'|| $criterio=='dni'|| $criterio=='ciudad'|| $criterio=='pais'
        || $criterio=='telefono'|| $criterio=='email'){

            $usuarios = User::
             join('empleados','usuarios.id','=','empleados.id')
            ->join('personas','empleados.id','=','personas.id')
            ->join('roles','usuarios.idrol','=','roles.id')
            ->select(
                'personas.id as idpersona',         
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
                'empleados.condicion as condicionempleado',
                'usuarios.condicion as condicionusuario',
                'usuarios.usuario',
                'usuarios.password',
                'usuarios.idrol',
                'roles.nombre as rol')
                ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
                ->orderBy('usuarios.id', 'asc')->paginate(10);

            }
        
        
        return [
            'pagination' => [
                'total'        => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page'     => $usuarios->perPage(),
                'last_page'    => $usuarios->lastPage(),
                'from'         => $usuarios->firstItem(),
                'to'           => $usuarios->lastItem(),
            ],
            'usuarios' => $usuarios
        ];
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
            $empleado->idcargo =$request->idcargo;
         
            
            $empleado->id = $persona->id;
            $empleado->save();

            $usuario = new User();
            $usuario->usuario=$request->usuario;
            $usuario->password=bcrypt($request->password) ;
            $usuario->condicion = '1';
            $usuario->idrol =$request->idrol;
         
            
            $usuario->id = $persona->id;
            $usuario->save();
 
            DB::commit();
 
        } catch (\Exception $e){
            DB::rollBack(); //DESACER TODO SI HUBIER ALAGUN ERROR
        }

 

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

         $usuario= User::findOrFail($request->id);
         $usuario->usuario=$request->usuario;
         $usuario->password=bcrypt($request->password) ;
         $usuario->condicion = '1';
         $usuario->idrol = $request->idrol;  
         $usuario->save();
         
        
    }

    public function list_user(Request $request){
        $usuarios = User::
             join('empleados','usuarios.id','=','empleados.id')
            ->join('personas','empleados.id','=','personas.id')
            ->join('roles','usuarios.idrol','=','roles.id')
            ->select(
                'personas.id as idpersona',         
                'personas.nombres as usernombre',
                'personas.apellidos as userapellido',
                'usuarios.condicion as condicionusuario',
                'usuarios.usuario',
                'usuarios.id as iduser',
                'usuarios.password',
                'usuarios.idrol',
                'roles.nombre as rol',
                'roles.id as idrol')
            ->orderBy('usuarios.id', 'asc')->get();
            return [            
                'usuarios' => $usuarios
            ];
    }
    public function activar(Request $request)
    {
        $rol= User::findOrFail($request->id);
        $rol->condicion='1';
        $rol->save();
    }
    public function desactivar(Request $request)
    {
         $rol= User::findOrFail($request->id);
         $rol->condicion='0';
         $rol->save();
    }

}
