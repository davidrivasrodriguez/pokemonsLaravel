<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Normal', 'Fire', 'Water', 'Electric', 'Grass',
            'Ice', 'Fighting', 'Poison', 'Ground', 'Flying',
            'Psychic', 'Bug', 'Rock', 'Ghost', 'Dragon',
            'Dark', 'Steel', 'Fairy'
        ];

        foreach ($types as $type) {
            DB::table('pokemon_types')->insert(['type' => $type]);
        }
    }
}