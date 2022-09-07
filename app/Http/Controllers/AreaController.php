<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $areas = DB::table('areas')->select('id', 'name')->get();
        return view('area.create', [
            'areas' => $areas
        ]);
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

    public function destroy(Area $area){
        $area->delete();

        return redirect()->route('area.create');
    }

}
