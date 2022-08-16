<?php

namespace App\Http\Controllers;

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
        return view('principal', [
            'elements' => $elements
        ]);
    }
    /*public function show(){
        return view('element.show');
    }
    */
}
