@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div class="">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth

                <p class="text-xl font-bold text-center mb-4">
                    Agrega un nuevo comentario
                </p>


                @if (session('mensaje'))
                    <div class=" bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <form action="{{ route('comentarios.store', ['user' => $post->user->username, 'post' => $post]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Titulo
                        </label>
                        <textarea
                            id="comentario"
                            name="comentario"
                            placeholder="comentario de la publicacion"
                            class="border p-3 w-full rounded-lg @error('comentario')
                                border-red-500
                            @enderror"
                            >{{ old('comentario') }}</textarea>

                        @error('comentario')
                            <p class="bg-red-500 text-white m-2 rounded text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="">
                        <button class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">Comentar</button>
                    </div>
                </form>

                @endauth


                <div class=" bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class=" p-5 border-gray-300 border-b">
                                <a href="{{ route('post.index', ['user' => $comentario->user]) }}" class=" font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p> {{ $comentario->comentario }}</p>
                                <p> {{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                         @endforeach
                    @else
                    <p class="p-10 text-center"> No hay comentarios</p>
                    @endif

                </div>

            </div>
        </div>
    </div>

@endsection
