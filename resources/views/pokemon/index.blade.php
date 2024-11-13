@extends('base')
@section('title', 'Lista de Pokémon')
@section('content')
    <table class="table table-striped table-hover" id="tablaPokemon">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Tipo</th>
                <th>Evoluciones</th>
                @if(session('user'))
                    <th>Eliminar</th>
                    <th>Editar</th>
                @endif
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemon as $poke)
                <tr>
                    <td>{{$poke->id}}</td>
                    <td>{{$poke->name}}</td>
                    <td>{{$poke->weight}} kg</td>
                    <td>{{$poke->height}} m</td>
                    <td>{{$poke->type->type}}</td>
                    <td>{{$poke->evolution_count}}</td>
                    @if(session('user'))
                        <td><a href="#" data-href="{{url('pokemon/' . $poke->id)}}" class="borrar">Eliminar</a></td>
                        <td><a href="{{url('pokemon/' . $poke->id . '/edit')}}">Editar</a></td>
                    @endif
                    <td><a href="{{url('pokemon/' . $poke->id)}}">Ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        @if(session('user'))
            <a href="{{url('pokemon/create')}}" class="btn btn-success">Añadir Pokémon</a>
            <form id="formDelete" action="{{ url('') }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{url('assets/scripts/script.js')}}"></script>
@endsection