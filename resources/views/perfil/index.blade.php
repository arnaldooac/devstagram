@extends('layouts.app')

@section('titulo')
    Editar Perfil {{ Auth::user()->username }}
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center">
        <div class=" md:w-1/2 bg-white shadow p-6 rounded-lg">
            <form action="{{ route('perfil.store') }}" class=" mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('username')
                            border-red-500
                        @enderror"
                        value="{{ auth()->user()->username }}"
                        >

                    @error('username')
                        <p class="bg-red-500 text-white m-2 rounded text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, jpeg, png"
                        >


                </div>



                <div class="">
                    <button class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">Guardar Cambios</button>
                </div>


            </form>
        </div>
    </div>
@endsection
