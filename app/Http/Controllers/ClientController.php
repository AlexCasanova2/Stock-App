<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        $clients = DB::table('clients')->select('id', 'name')->get();
        return view('client.create',[
            'clients' => $clients
        ]);
        //return back()->with('mensaje', 'Client creat correctament');
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

        //return redirect()->route('client.create');
        return back()->with('mensaje', 'Client creat correctament');
    }

    //Seleccionamos todos los elementos que han sido creados por el cliente
    public function show(Client $client, Element $element){
        $elements = Element::where('client_id', $client->id)->get();
        return view('client.show', [
            'client' => $client,
            'elements' => $elements
        ]);
    }

    public function destroy(Client $client){
        $client->delete();

        //return redirect()->route('client.create');
        return back()->with('mensaje', 'Client esborrat correctament');
    }

    public function pdf(Client $client){
        $elements = Element::where('client_id', $client->id)->get();

        $pdf = PDF::loadView('client.pdf', [
            'client' => $client,
            'elements' => $elements
        ]);
        return $pdf->stream($client->id."-".$client->name.".pdf");

        /*return view('element.pdf', [
            'element' => $element
        ]);*/
    }
}
