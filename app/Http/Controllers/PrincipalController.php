<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //$elements = DB::table('elements')->where('area_id')->select('name')->get();
        //$elements = DB::table('elements')->select('id', 'name', 'stock', 'proveidor_id' , 'area_id', 'client_id')->where('estat', '=', 'publicat')->get();
        $element1 = Element::with('proveidor', 'client', 'area')->where('estat', '=', 'disponible')->orWhere('estat', '=', 'publicat')->get();
        $client = DB::table('clients')->select('id', 'name');
        $estat = DB::table('estats')->select('id','name')->get();
        
        return view('principal', [
            'elements' => $element1,
            'client' => $client,
            'estats' => $estat
        ]);
    }

    public function buscar(Request $request){
        $name = $request->name;
        $estat = $request->estat;
        $order = $request->order;
        //dd($name .','. $order . ',' . $estat);
        if($name == '' && $estat){
            $elements = Element::where("estat", "LIKE","%{$estat}%")
                ->orderBy('name', $order)->get();
        }
        if($name == '' && $estat == 'all'){
            $elements = Element::where("estat", "LIKE", "publicat")
                ->orWhere("estat", "LIKE", "disponible")
                ->orWhere("estat", "LIKE", "en us")
                ->orderBy('name', $order)->get();
        }
        if($name){
            if($estat == 'all'){
                $elements = Element::where("name", "LIKE", "%{$name}%")
                    ->orWhere("estat", "LIKE", "publicat")
                    ->where("estat", "LIKE", "disponible")
                    ->where("estat", "LIKE", "en us")
                    ->orderBy('name', $order)->get();
            }else{
                $elements = Element::where("name", "LIKE", "%{$name}%")
                ->where("estat", "LIKE","%{$estat}%")
                ->orderBy('name', $order)->get();
            }
        }
          return view('buscar',[
            'elements' => $elements,
            'request' => $request
          ]);
    }
}
