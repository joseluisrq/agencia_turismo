<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;

class CategoriaControlador extends Controller
{
    
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $categorias = Categoria::
            select(
                'id', 
                'nombre',
                'descripcion', 
                'condicion')
            ->orderBy('id', 'asc')->paginate(10);
        }
        else if($criterio=='nombre'){
                $categorias = Categoria::
                select(
                    'id', 
                    'nombre',
                    'descripcion',
                    'condicion')
                ->where('nombre', 'like', '%'. $buscar . '%')
                ->orderBy('id', 'asc')->paginate(10);

            }
        
         
        return [
            'pagination' => [
                'total'        => $categorias->total(),
                'current_page' => $categorias->currentPage(),
                'per_page'     => $categorias->perPage(),
                'last_page'    => $categorias->lastPage(),
                'from'         => $categorias->firstItem(),
                'to'           => $categorias->lastItem(),
            ],
            'categorias' => $categorias
        ];
    



    } 
    public function selectCategoria(Request $request){
      
            $filtro = $request->filtro;
            $categorias = Categoria::where('condicion', '=', '1')       
            ->select('id','nombre')
            ->orderBy('id', 'asc')->get();

            return ['categorias' => $categorias];
    }
     public function selectCategoria2(Request $request){
      
            $filtro = $request->filtro;
            $categorias = Categoria::where('condicion', '=', '1')       
            ->select('id','nombre')
            ->where('nombre', 'like', '%'. $filtro . '%')
            ->get();

            return ['categorias' => $categorias];
    }
    public function registrar(Request $request)
    {
        //almacenar
        $categoria=new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->condicion='1';
        $categoria->save();

    }
    public function actualizar(Request $request)
    {
         //actualizar
         $categoria= Categoria::findOrFail($request->id);
         $categoria->nombre=$request->nombre;
         $categoria->descripcion=$request->descripcion;
         $categoria->condicion='1';
         $categoria->save();
    }

    public function activar(Request $request)
    {
        $categoria= Categoria::findOrFail($request->id);
        $categoria->condicion='1';
        $categoria->save();
    }
    public function desactivar(Request $request)
    {
         $categoria= Categoria::findOrFail($request->id);
         $categoria->condicion='0';
         $categoria->save();
    }

   
}
