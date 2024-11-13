@extends('base')
@section('title', 'Crear Pokémon')
@section('content')
    <form action="{{url('pokemon')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Pokémon</label>
            <input value="{{old('name')}}" required type="text" class="form-control" id="name" name="name" placeholder="Nombre del Pokémon">
        </div>
        <div class="form-group">
            <label for="weight">Peso del Pokémon</label>
            <input value="{{old('weight')}}" required type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Peso del Pokémon">
        </div>
        <div class="form-group">
            <label for="height">Altura del Pokémon</label>
            <input value="{{old('height')}}" required type="number" step="0.01" class="form-control" id="height" name="height" placeholder="Altura del Pokémon">
        </div>
        <div class="form-group">
            <label for="type_id">Tipo del Pokémon</label>
            <select required class="form-control" id="type_id" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="evolution_count">Evoluciones</label>
            <input value="{{old('evolution_count')}}" required type="number" min="0" class="form-control" id="evolution_count" name="evolution_count" placeholder="Evoluciones">
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
@endsection