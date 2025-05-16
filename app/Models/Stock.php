<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = [
        'name', 'description', 'unit', 'active'
    ];
 
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_stock')
            ->withPivot('quantity')
            ->withTimestamps();
    }
 
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
}
