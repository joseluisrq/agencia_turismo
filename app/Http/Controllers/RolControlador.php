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
                'descripcion')->get();

        return [  'roles' => $roles];
    }
}
