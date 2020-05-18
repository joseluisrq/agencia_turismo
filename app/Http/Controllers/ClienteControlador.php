<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Persona;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Client;
use Illuminate\Support\Facades\DB;

class ClienteControlador extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $clientes = Cliente::
            join('personas','clientes.id','=','personas.id')
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
                'clientes.condicion')
            ->orderBy('clientes.id', 'asc')->paginate(10);
        }
        else if($criterio=='nombres' || $criterio=='apellidos'|| $criterio=='dni'|| $criterio=='ciudad'|| $criterio=='pais'
        || $criterio=='telefono'|| $criterio=='email'){
            $clientes = Cliente::
            join('personas','clientes.id','=','personas.id')
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
                'clientes.condicion')
                ->where('personas.'.$criterio, 'like', '%'. $buscar . '%')
                ->orderBy('clientes.id', 'asc')->paginate(10);

            }
        
        
        return [
            'pagination' => [
                'total'        => $clientes->total(),
                'current_page' => $clientes->currentPage(),
                'per_page'     => $clientes->perPage(),
                'last_page'    => $clientes->lastPage(),
                'from'         => $clientes->firstItem(),
                'to'           => $clientes->lastItem(),
            ],
            'clientes' => $clientes
        ];
    }
    
    public function selectCliente(Request $request){
       // if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $clientes = Cliente::
        join('personas','clientes.id','=','personas.id')
        ->where('personas.nombres', 'like', '%'. $filtro . '%')
        ->orWhere('personas.dni', 'like', '%'. $filtro . '%')
        ->select('personas.id','personas.nombres','personas.dni')
        ->orderBy('personas.nombres', 'asc')->get();

        return ['clientes' => $clientes];
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
 
            $cliente = new Cliente();
            $cliente->condicion = '1';
         
            
            $cliente->id = $persona->id;
            $cliente->save();
 
            DB::commit();
 
        } catch (\Exception $e){
            DB::rollBack(); //DESACER TODO SI HUBIER ALAGUN ERROR
        }

 

    }
    public function activar(Request $request)
    {
        $cliente= Cliente::findOrFail($request->id);
        $cliente->condicion='1';
        $cliente->save();
    }
    public function desactivar(Request $request)
    {
         $cliente= Cliente::findOrFail($request->id);
         $cliente->condicion='0';
         $cliente->save();
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

         $cliente= Cliente::findOrFail($request->id);
         $cliente->condicion='1';
         $cliente->save();
         
         $persona->save();
    }

}
