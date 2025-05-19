<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'stock_id', 'ingredient_id', 'quantity', 'movement_type', 'description', 'type'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
