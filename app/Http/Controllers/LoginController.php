<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function Loginview(){

        
         return view('Login/Login');
    }

    public function Login(){

        session_start();

        $_SESSION['access_token']=null;

        if(auth()->attempt(request(['rut', 'password'])) == false){
            return back()->with('message', 'El rut o contraseña son incorrectos');
   
           }else{

            return redirect()->route('cal.index')->with('mensaje','Bienvenido : '. auth()->user()->nombre);
           }      
     }

    public function Cierre(){

        session_start();

        $_SESSION['access_token']=null;
        
        auth()->logout();

       return view('welcome');
    }

    public function Register(Request $request){

        session_start();

        $_SESSION['access_token']=null;

        $user = new User();
        $user->rut = $request->rut;
        $user->nombre = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $comprovacion = $user->save();

        auth()->login($user);

        if($comprovacion==true){

         return redirect()->route('cal.index')->with('mensaje','Bienvenido : '. auth()->user()->nombre);

       }else{
        
        return redirect()->back()->with('message','Ocurrio un error');

       }


      
    }

    
}
