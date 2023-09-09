@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')

<x-listar-post :posts=$posts>
   <x-slot:titulo>
        <h1>titulo del componente</h1>
   </x-slot:titulo>
</x-listar-post>



@endsection
