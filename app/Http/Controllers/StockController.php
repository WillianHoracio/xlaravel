<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Models\Stock;
use App\Models\Ingredient;

class StockController extends Controller
{
    const DEFAULT_STOCK_ID = 1;
    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index',['stocks' => $stocks]);
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(StoreStockRequest $request)
    {
        try
        {
            Stock::create($request->validated());
            return redirect()->route('stock.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    public function destroy(Stock $stock)
    {
        if($stock->id == self::DEFAULT_STOCK_ID){
            return redirect()->route('stock.index')->with('error', 'Não é possível excluir o grupo de armazenamento default.');
        }

        $stock->delete();
        return redirect()->route('stock.index');
    }

    public function ingredients(Stock $stock)
    {
        $ingredients = $stock->ingredients()->get();

        return view('stocks.items', [
            'stock' => $stock,
            'ingredients' => $ingredients
        ]);
    }

    public function ingredient(Stock $stock, Ingredient $ingredient)
    {
        $ingredientData = $stock ->ingredients()->find($ingredient->id);
        
        return view('stocks.movement', [
            'stock' => $stock,
            'ingredient' => $ingredientData
        ]);
    }

}
