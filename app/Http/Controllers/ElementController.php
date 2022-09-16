<?php
namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Element;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

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
            'estat' => '',
            'caracteristiques' => 'max:255',
            'tipus' => 'required',
            'adquisicio' => 'required',
            'proveidor' => 'required',
            'area' => 'required',
            'client' => 'required'
        ]);
        
        if($request->imagen == null){
            Element::create([
                'name' => $request->name,
                'description' => $request->description,
                'imagen' => '',
                'stock' => $request->stock,
                'estat' => 'disponible',
                'caracteristiques' => $request->caracteristiques,
                'tipus' => $request->tipus,
                'adquisicio' => $request->adquisicio,
                'proveidor_id' => $request->proveidor,
                'client_id' => $request->client,
                'area_id' => $request->area,
                'user_id' => auth()->user()->id
            ]);
        }else{
            Element::create([
                'name' => $request->name,
                'description' => $request->description,
                'imagen' => $request->imagen,
                'stock' => $request->stock,
                'estat' => 'disponible',
                'caracteristiques' => $request->caracteristiques,
                'tipus' => $request->tipus,
                'adquisicio' => $request->adquisicio,
                'proveidor_id' => $request->proveidor,
                'client_id' => $request->client,
                'area_id' => $request->area,
                'user_id' => auth()->user()->id
            ]);
        }    

        return redirect()->route('element.create');
    }

    public function show(User $user, Element $element){
        return view('element.show', [
            'element' => $element,
            'user' => $user
        ]);
    }

    public function setDraft(Element $element){
        $element->estat = 'borrat';
        $element->save();
        return back()->with('mensaje', 'Element esborrat correctament');
        //return redirect()->route('principal');
    }

    public function destroy(Element $element){
        $element->delete();
        //imprimir mensaje
        return back()->with('mensaje', 'Element esborrat correctament');
        //return redirect()->route('principal');
    }

    public function edit(Element $element){
        $areas = DB::table('areas')->select('id', 'name')->get();
        $clients = DB::table('clients')->select('id', 'name')->get();
        $estats = DB::table('estats')->select('id','name')->get();
        $proveidors = DB::table('proveidors')->select('id', 'name')->get();
        return view('element.edit',[
            'areas' => $areas,
            'clients' => $clients,
            'estats' => $estats,
            'proveidors' => $proveidors,
            'element' => $element
        ]);
    }

    public function updateElement(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'imagen' => '',
            'stock' => 'required|numeric',
            'estat' => '',
            'caracteristiques' => 'max:255',
            'tipus' => 'required',
            'adquisicio' => 'required',
            'proveidor' => 'required',
            'area' => 'required',
            'client' => 'required'
        ]);

        if($request->imagen){
            $imagen = $request->file('file');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            //Ajustar la imagen a un tamaño predefinido
            $imagenServidor->fit(1000, 1000);

            //Almacenar la imagen
            $imagenPath = public_path('uploads') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        
        $element = Element::find($request->id);
        $element->name = $request->name;
        $element->description = $request->description;
        $element->imagen = $request->imagen ?? '';
        $element->stock = $request->stock;
        $element->estat = $request->estat;
        $element->caracteristiques = $request->caracteristiques;
        $element->tipus = $request->tipus;
        $element->adquisicio = $request->adquisicio;
        $element->proveidor_id = $request->proveidor;
        $element->client_id = $request->client;
        $element->area_id = $request->area;

        $element->save();

        return redirect()->route('element.show', $element->id);
    }

    public function mailStock(){
        Mail::to('alex@tandemprojects.cat')->send(new \App\Mail\StockAviso);
    }

    public function pdf(Element $element){

        $pdf = PDF::loadView('element.pdf', ['element' => $element]);
        return $pdf->stream($element->id."-".$element->name.".pdf");

        /*return view('element.pdf', [
            'element' => $element
        ]);*/
    }
}
