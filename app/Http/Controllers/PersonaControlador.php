<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Illuminate\Support\Facades\DB;

class PersonaControlador extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $personas = Persona::
            select(
                'id',
                'dni',
                'nombres',
                'apellidos',
                'tipo_documento',            
                'direccion',
                'ciudad',
                'pais',
                'telefono',
                'email',
                'sexo')
            ->orderBy('id', 'asc')->paginate(10);
        }
        else if($criterio=='nombre'){
                $personas = Persona::
                select(
                    'id',
                    'dni',
                    'nombres',
                    'apellidos',
                    'tipo_documento',                
                    'direccion',
                    'ciudad',
                    'pais',
                    'telefono',
                    'email',
                    'sexo')
                ->where('nombres', 'like', '%'. $buscar . '%')
                ->orderBy('id', 'asc')->paginate(10);

            }
        
         
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    



    } 
    public function selectCategoria(Request $request){
       if (!$request->ajax()) return redirect('/');
            $filtro = $request->filtro;
            $categorias = Persona::where('condicion', '=', '1')       
            ->select('id','nombre')
            ->orderBy('id', 'asc')->get();

            return ['categorias' => $categorias];
    }
    public function registrar(Request $request)
    {
        //almacenar
        if (!$request->ajax()) return redirect('/');
         
        $categoria=new Persona();
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->condicion='1';
        $categoria->save();

      

    }
    public function actualizar(Request $request)
    {
         //actualizar
         $categoria= Persona::findOrFail($request->id);
         $categoria->nombre=$request->nombre;
         $categoria->descripcion=$request->descripcion;
         $categoria->condicion='1';
         $categoria->save();
    }

    public function activar(Request $request)
    {
        $categoria= Persona::findOrFail($request->id);
        $categoria->condicion='1';
        $categoria->save();
    }
    public function desactivar(Request $request)
    {
         $categoria= Persona::findOrFail($request->id);
         $categoria->condicion='0';
         $categoria->save();
    }
    
}
