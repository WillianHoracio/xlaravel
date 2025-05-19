<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockMovementController;

Route::get('/', function () {
    return view('Xistema');
});

Route::get(   '/ingredients',                  [IngredientController::class, 'index'])   ->name('ingredients.index');
Route::get(   '/ingredients/create',           [IngredientController::class, 'create'])  ->name('ingredients.create');
Route::get(   '/ingredients/{ingredient}',     [IngredientController::class, 'show'])    ->name('ingredients.show');
Route::put(   '/ingredients/{ingredient}',     [IngredientController::class, 'update'])  ->name('ingredients.update');
Route::post(  '/ingredients/store',            [IngredientController::class, 'store'])   ->name('ingredients.store');
Route::delete('/ingredients/{ingredient}',     [IngredientController::class, 'destroy']) ->name('ingredients.destroy');

Route::get(   '/stock',                        [StockController::class, 'index'])        ->name('stock.index');
Route::get(   '/stock/store',                  [StockController::class, 'create'])       ->name('stock.create');
Route::get(   '/stock/{stock}/ingredients',    [StockController::class, 'ingredients'])  ->name('stock.ingredients');
Route::post(  '/stock/store',                  [StockController::class, 'store'])        ->name('stock.store');
Route::delete('/stock/{stock}',                [StockController::class, 'destroy'])      ->name('stock.destroy');
Route::get(   '/stock/{stock}/ingredient/{ingredient}',[StockController::class, 'ingredient'])     ->name('stock.ingredient');

Route::post(  '/stock/{stock}/move/{ingredient}'    ,[StockMovementController::class, 'move'])->name('movement.move');