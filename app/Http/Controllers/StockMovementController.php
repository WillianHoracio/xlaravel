<?php
    namespace App\Http\Controllers;
    
    use App\Http\Controllers\Controller;
    use App\Models\Stock;
    use App\Models\Ingredient;
    use App\Repositories\StockMovementRepository;
    use App\Http\Requests\MoveRequest;

    class StockMovementController extends Controller
    {
        protected $stockMovementRepositorie;

        public function __construct(StockMovementRepository $stockMovementRepository)
        {
            $this->stockMovementRepositorie = $stockMovementRepository;
        }

        public function move(Stock $stock, Ingredient $ingredient, MoveRequest $request)
        {    
            try
            {
                $this->stockMovementRepositorie->move(
                    $stock, 
                    $ingredient, 
                    $request->type, 
                    $request->quantity,
                    $request->description
                );
                return redirect()->route('stock.ingredient',[
                        'stock' => $stock->id,
                        'ingredient' => $ingredient->id
                    ])->with('success', 'Movimentação realizada com sucesso.');
            }
            catch (\Exception $e)
            {
                return redirect()->route('stock.ingredient',[
                        'stock' => $stock->id,
                        'ingredient' => $ingredient->id
                    ])->with('error', $e->getMessage());
            }
        }
    }