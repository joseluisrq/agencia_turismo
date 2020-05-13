<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function mostrarFormularioLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
       
        $this->validarLogin($request);
     
        if(Auth::attempt([
            'usuario'=>$request->usuario,
            'password'=>$request->password,
            'condicion'=>1,
        ])){
            return redirect()->route('main');
        }
      
        return back()->withErrors(['usuario'=>trans('auth.failed')])
        ->withInput(request(['usuario'])); 
    }

    protected function validarLogin(Request $request){
          
            $this->validate($request,[
                'usuario'=>'required|string',
                'password'=>'required|string'
            ]);
    }

    public function cerrarSesion(Request $request){
      
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
