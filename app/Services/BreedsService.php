<?php

namespace App\Services;

use App\Models\Breed;
use Illuminate\Support\Str;

class BreedsService
{
    public function deleteBreed(int $id): bool
    {
        return Breed::destroy($id);
    }

    public function createBreed(array $data): Breed
    {
        return Breed::create([
            'breed_id' => Str::lower(Str::replace(' ', '', $data['name'])),
            'name' => $data['name'],
            'description' => $data['desc'],
            'avr_life_time' => $data['avr_life_time'],
        ]);
    }

    public function updateBreed(array $data): Breed
    {
        $breed = Breed::find($data['id']);
        $breed->update([
            'name' => $data['name'],
            'description' => $data['desc'],
            'avr_life_time' => $data['avr_life_time'],
        ]);

        return $breed;
    }
}
