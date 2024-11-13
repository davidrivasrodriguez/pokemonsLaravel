<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return view('pokemon.index', [
            'lipokemon' => 'active',
            'pokemon' => Pokemon::with('type')->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('pokemon.create', [
            'lipokemon' => 'active',
            'types' => PokemonType::orderBy('type')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pokemon|max:100|min:2',
            'weight' => 'required|numeric|gte:0|lte:1000',
            'height' => 'required|numeric|gte:0|lte:15',
            'type_id' => 'required|exists:pokemon_types,id',
            'evolution_count' => 'required|numeric|gte:0',
        ]);

        try {
            Pokemon::create($validated);
            return redirect('pokemon')->with(['message' => 'El Pokémon ha sido creado.']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'El Pokémon no ha sido creado.']);
        }
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', [
            'lipokemon' => 'active',
            'pokemon' => $pokemon->load('type'),
        ]);
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', [
            'lipokemon' => 'active',
            'pokemon' => $pokemon,
            'types' => PokemonType::orderBy('type')->get(),
        ]);
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|min:2|unique:pokemon,name,' . $pokemon->id,
            'weight' => 'required|numeric|gte:0|lte:1000',
            'height' => 'required|numeric|gte:0|lte:15',
            'type_id' => 'required|exists:pokemon_types,id',
            'evolution_count' => 'required|numeric|gte:0',
        ]);

        try {
            $pokemon->update($validated);
            return redirect('pokemon')->with(['message' => 'El Pokémon ha sido actualizado.']);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'El Pokémon no ha sido actualizado.']);
        }
    }

    public function destroy(Pokemon $pokemon)
    {
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'El Pokémon ha sido eliminado.']);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'El Pokémon no ha sido eliminado.']);
        }
    }
}