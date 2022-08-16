<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        return view('client.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'imagen' => ''
        ]);

        Client::create([
            'name' => $request->name,
            'imagen' => 'imagen',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('client.create');
    }
}
