@extends('base')
@section('title', 'Editar Pokémon')
@section('content')
    <form action="{{url('pokemon/' . $pokemon->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nombre del Pokémon</label>
            <input value="{{old('name', $pokemon->name)}}" required type="text" class="form-control" id="name" name="name" placeholder="Nombre del Pokémon">
        </div>
        <div class="form-group">
            <label for="weight">Peso del Pokémon</label>
            <input value="{{old('weight', $pokemon->weight)}}" required type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="Peso del Pokémon">
        </div>
        <div class="form-group">
            <label for="height">Altura del Pokémon</label>
            <input value="{{old('height', $pokemon->height)}}" required type="number" step="0.01" class="form-control" id="height" name="height" placeholder="Altura del Pokémon">
        </div>
        <div class="form-group">
            <label for="type_id">Tipo del Pokémon</label>
            <select required class="form-control" id="type_id" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id', $pokemon->type_id) == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="evolution_count">Evoluciones</label>
            <input value="{{old('evolution_count', $pokemon->evolution_count)}}" required type="number" min="0" class="form-control" id="evolution_count" name="evolution_count" placeholder="Evoluciones">
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection