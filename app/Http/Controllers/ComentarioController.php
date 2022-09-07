<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Element $element){
        //validar comentario
        //dd($element->id);
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);
        
        //guardar comentario
        Comentario::create([
            'user_id' => auth()->user()->id,
            'element_id' => $element->id,
            'comentario' => $request->comentario
        ]);
        
        //imprimir mensaje
        return back()->with('mensaje', 'Comentari realitzat correctament');
    }

    public function destroy(Comentario $comentario){
        $comentario->delete();
        return back()->with('mensaje', 'Comentari esborrat correctament');
    }
}
