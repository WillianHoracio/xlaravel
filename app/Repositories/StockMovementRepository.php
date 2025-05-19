<?php
    namespace App\Repositories;

    use App\Models\Stock;
    use App\Models\Ingredient;
    use App\Models\StockMovement;
    use Illuminate\Support\Facades\DB;

    class StockMovementRepository{

        const TYPE_IN = 'in';
        const TYPE_OUT = 'out';
        
        public function move(Stock $stock, Ingredient $ingredient, string $type, float $quantity, string $description = '')
        {            
            try 
            {
                return DB::transaction(function () use ($stock, $ingredient, $type, $quantity, $description) 
                {
                    $currentStock = $this->getCurrentStock(
                        $stock,
                        $ingredient
                    );
                    
                    $this->validateMovement(
                        $stock,
                        $ingredient,
                        $type,
                        $quantity,
                        $currentStock
                    );
                    
                    $this->updateStock(
                        $stock, 
                        $ingredient, 
                        $type, 
                        $quantity,
                        $currentStock
                    );
                    
                    return StockMovement::create([
                        'stock_id'      => $stock->id,
                        'ingredient_id' => $ingredient->id,
                        'type'          => $type,
                        'quantity'      => $quantity,
                        'description'   => $description
                    ]);
                });
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }            
        }

        public function updateStock(Stock $stock, Ingredient $ingredient, string $type, float $quantity, float $currentStock)
        {
            if ($type == self::TYPE_IN) {
                $currentStock += $quantity;
            } elseif ($type == self::TYPE_OUT) {
                $currentStock -= $quantity;
            }
            $stock->ingredients()->updateExistingPivot($ingredient->id, ['quantity' => $currentStock]);
        }

        public function getCurrentStock(Stock $stock, Ingredient $ingredient)
        {
            return $stock->ingredients()->find($ingredient->id)->pivot->quantity;
        }
        
        public function validateMovement(Stock $stock, Ingredient $ingredient, string $type, float $quantity, float $currentStock)
        {
            if (!$stock->active){
                throw new \Exception('Estoque inativo.');
            }
            if (!$ingredient->active){
                throw new \Exception('Ingrediente inativo.');
            }
            if ($type == self::TYPE_OUT) {
                if ($currentStock < $quantity) {
                    throw new \Exception('Estoque insuficiente.');
                }
            }
        }
    }