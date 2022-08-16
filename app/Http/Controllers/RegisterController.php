<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request->get('name'));

        //$request->request->add();

        $this->validate($request, [
            'name' => 'required | min:4',
            'email' => 'required | unique:users|email|max:60', 
            'password' => 'required | confirmed | min:6',
            'imagen' => ''
        ]);


    User::create([
        'name' => Str::Slug($request->name) ,
        'email' => $request->email,
        'password' => Hash::make($request->password) ,
        'imagen' => '',
    ]);

    //Autenticar usuario
    auth()->attempt([
        'email' => $request->email,
        'password' => $request->password
    ]);

    //Otra forma de autenticar
    auth()->attempt($request->only('email', 'password'));

    //Redireccionar usuario
    return redirect()->route('post.index', auth()->user()->name);

    }
}
