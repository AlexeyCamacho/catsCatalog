<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'avr_life_time',
        'breed_id'
    ];

    public function cats(): HasMany
    {
        return $this->hasMany(Cat::class);
    }
}
