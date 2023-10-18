<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class CatApiService
{
    public function getAllBreeds(): array|int
    {
        $response = Http::get('https://api.thecatapi.com/v1/breeds');

        if ($response->successful()) {
            return $response->json();
        } else {
            return $response->status();
        }
    }
}
