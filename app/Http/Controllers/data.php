<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class data extends Controller
{


    public function index(){
         //Consultamos los datos
         //latest sirve para consultar por fecha
         $users = User::latest()->get();
         return view('index',[
         //Pasamos los datos a la vista
             'users' => $users
         ]);
    }
    public function storage(Request $request){


        $request->validate([
            'name' => ['required', 'unique:users'],
            //Unique se le especifica el nombre de la tabla es decir laravel
            //Automaticamente mirara en la tabla que no exista un valor igual
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        //Guardamos en la base de datos
        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            //Metodo bcrypt sirve para encriptar 
            'password' => bcrypt($request->password),
        ]);

        return back();
    }
    
    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
