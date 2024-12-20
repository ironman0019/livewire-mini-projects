<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    /** @use HasFactory<\Database\Factories\ContinentFactory> */
    use HasFactory;

    // Relation with countries
    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
