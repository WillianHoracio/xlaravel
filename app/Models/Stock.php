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

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    protected static function booted()
    {
        static::created(function ($stock) {
            Ingredient::all()->each(function ($ingredient) use ($stock) {
                $stock->ingredients()->attach($ingredient->id, ['quantity' => 0]);
            });
        });
    }
 
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
}
