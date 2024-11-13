@extends('base')
@section('title', 'Detalles del Pokémon')
@section('content')
    <div class="form-group">
        Pokémon número #:
        {{$pokemon->id}}
    </div>
    <div class="form-group">
        Nombre del Pokémon:
        {{$pokemon->name}}
    </div>
    <div class="form-group">
        Peso del Pokémon:
        {{$pokemon->weight}} kg
    </div>
    <div class="form-group">
        Altura del Pokémon:
        {{$pokemon->height}} m
    </div>
    <div class="form-group">
        Tipo del Pokémon:
        {{$pokemon->type->type}}
    </div>
    <div class="form-group">
        Evoluciones:
        {{$pokemon->evolution_count}}
    </div>
    <div class="form-group">
        <a href="{{url()->previous()}}">Volver</a>
    </div>
@endsection