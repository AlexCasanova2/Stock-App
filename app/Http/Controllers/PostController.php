<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Element;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $elements = Element::where('user_id', $user->id)->get();

        return view('dashboard', [
            'user' => $user,
            'elements'  => $elements,
        ]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'imagen' => ''
        ]);

        /*
        Post::create([
            'titulo' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        */

        //Otro metodo de publicar posts

        /*
        $post = new Post;
        $post->titulo = $request->nombre;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = $request->auth()->user()->id;
        */

        $request->user()->posts()->create([
            'titulo' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->name);

    }
}
