<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('area.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'imagen' => ''
        ]);

        Area::create([
            'name' => $request->name,
            'imagen' => 'imagen',
        ]);

        return redirect()->route('area.create');
    }
}
