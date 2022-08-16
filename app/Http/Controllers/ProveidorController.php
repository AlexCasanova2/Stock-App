<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Proveidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveidorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $proveidors = DB::table('proveidors')->select('id', 'name')->get();
        return view('proveidor.create',[
            'proveidors' => $proveidors
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:255',
            'imagen' => ''
        ]);

        Proveidor::create([
            'name' => $request->name,
            'imagen' => 'imagen',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('proveidor.create');
    }

    public function destroy(Proveidor $proveidor){
        $proveidor->delete();

        return redirect()->route('proveidor.create');
    }


}
