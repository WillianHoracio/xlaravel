<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Models\Stock;

class StockController extends Controller
{
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
        Stock::create([
            'name'        => $request->name,
            'description' => $request->description,
            'active'      => $request->active ?? false,
        ]);
        return redirect()->route('stock.index');
    }

    public function destroy(Stock $stock)
    {
        if($stock->id == 1){
            return redirect()->route('stock.index')->with('error', 'Não é possível excluir o grupo de armazenamento default.');
        }

        $stock->delete();
        return redirect()->route('stock.index');
    }

    public function items(Stock $stock)
    {
        $ingredients = $stock->ingredients()->withPivot('quantity')->get();

        return view('stocks.items', ['stock' => $stock, 'ingredients' => $ingredients]);
    }
}
