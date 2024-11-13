<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class, 'type_id');
    }
}