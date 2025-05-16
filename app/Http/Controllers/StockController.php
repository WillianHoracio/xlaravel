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
        $stock->delete();
        return redirect()->route('stock.index');
    }
}
