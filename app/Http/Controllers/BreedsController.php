<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use App\Services\BreedsService;
use App\Http\Requests\BreedFormRequest;

class BreedsController extends Controller
{
    private BreedsService $breedsService;

    public function __construct()
    {
        $this->breedsService = new BreedsService();
    }

    public function getAllBreeds(): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            Breed::all()
        );
    }

    public function createBreed(BreedFormRequest $request): Breed
    {
        return $this->breedsService->createBreed($request->only('name', 'avr_life_time', 'desc'));
    }

    public function updateBreed(BreedFormRequest $request): Breed
    {
        return $this->breedsService->updateBreed($request->only('id', 'name', 'avr_life_time', 'desc'));
    }

    public function deleteBreed(Request $request): bool
    {
        $breedID = $request->route('id');
        return $this->breedsService->deleteBreed($breedID);
    }
}
