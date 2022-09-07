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

        $elements = DB::table('elements')->select('id', 'name', 'stock', 'proveidor_id' , 'area_id', 'client_id')->get();
        $element1 = Element::with('proveidor', 'client', 'area')->get();
        $client = DB::table('clients')->select('id', 'name');
        return view('principal', [
            'elements' => $element1,
            'client' => $client
        ]);
    }
    /*public function show(){
        return view('element.show');
    }
    */
}
