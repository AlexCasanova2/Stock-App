<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Roles::create([
            'name' => $request->name
        ]);

        return redirect()->route('role.create');
    }
}
