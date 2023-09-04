@extends('layouts.app')

@section('titulo')
Inicia esion en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Registro de usuarios">
        </div>

        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login.store') }}" method="POST" novalidate>
                @csrf


                @if (session('mensaje'))
                    <p class="bg-red-500 text-white m-2 rounded text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu email"
                        class="border p-3 w-full rounded-lg"
                        >

                        @error('email')
                        <p class="bg-red-500 text-white m-2 rounded text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                        @enderror
                </div>


                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Tu password"
                        class="border p-3 w-full rounded-lg"
                        >

                        @error('password')
                        <p class="bg-red-500 text-white m-2 rounded text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                        @enderror
                </div>


                <div class="mb-5">
                    <input type="checkbox"
                           name="remember">
                    <label for="" class="text-gray-500 text-sm">Mantener mi sesion abierta</label>
                </div>




                <div class="">
                    <button class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">Iniciar Sesion</button>
                </div>

            </form>
        </div>
    </div>
@endsection
