<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(4);
        return view('layouts.dashboard', compact('user', 'posts') );
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => ['required'],
            'descripcion' => ['required'],
            'imagen' => ['required']
        ]);

        // 1ra forma
        /*
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' =>$request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        */

        // 2da forma
        /*
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->titulo = $request->imagen;
        $post->titulo = auth()->user()->id;
        $post->save();
        */

        // 3ra forma
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' =>$request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('post.index', ['user' => auth()->user()->username])->with([
            'exito' => 'Publicacion exitosa'
        ]);
    }


    public function show(User $user, Post $post)
    {
        return view('posts.show', compact('post', 'user'));
    }


}
