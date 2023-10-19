<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BreedsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/cats');

Route::any( '/{any}', function(){
    return view('main');
})->where('any', '^((?!api\/).)*$');

Route::prefix("api")->group(function () {
    Route::prefix("cats")->group(function () {

    });

    Route::prefix("breeds")->group(function () {
        Route::get('/', [BreedsController::class, 'getAllBreeds']);
        Route::post('/', [BreedsController::class, 'createBreed']);
        Route::put('/{id}', [BreedsController::class, 'updateBreed']);
        Route::delete('/{id}', [BreedsController::class, 'deleteBreed']);
    });
});
