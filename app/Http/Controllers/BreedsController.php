<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedsController extends Controller
{
    public function getAllBreeds(): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            Breed::all()
        );
    }
}
