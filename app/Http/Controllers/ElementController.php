<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $areas = DB::table('areas')->select('id', 'name')->get();
        $clients = DB::table('clients')->select('id', 'name')->get();
        $estats = DB::table('estats')->select('id','name')->get();
        $proveidors = DB::table('proveidors')->select('id', 'name')->get();
        return view('element.create',[
            'areas' => $areas,
            'clients' => $clients,
            'estats' => $estats,
            'proveidors' => $proveidors
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'imagen' => '',
            'stock' => 'required|numeric',
            'estat' => 'required',
            'ample' => 'required|numeric',
            'llarg' => 'required|numeric',
            'alçada' => 'required|numeric',
            'adquisicio' => 'required',
            'proveidor' => 'required',
            'area' => 'required',
            'client' => 'required'
        ]);

        Element::create([
            'name' => $request->name,
            'description' => $request->description,
            'imagen' => $request->imagen,
            'stock' => $request->stock,
            'estat' => $request->estat,
            'ample' => $request->ample,
            'llarg' => $request->llarg,
            'alçada' => $request->alçada,
            'adquisicio' => $request->adquisicio,
            'proveidor_id' => $request->proveidor,
            'client_id' => $request->client,
            'area_id' => $request->area,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('element.create');
    }

    public function show(){
        $element1 = Element::with('proveidor', 'client', 'area')->get();
        return view('element.show', [
            'element' => $element1
        ]);
    }

    public function destroy(Element $element){
        $element->delete();

        return redirect()->route('principal');
    }

}
