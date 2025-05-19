<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Ingredient extends Model{
        protected $fillable = [
            'name', 'description', 'unit', 'active',
        ];

        public function stocks()
        {
            return $this->belongsToMany(Stock::class,'ingredient_stock')
                ->withPivot('quantity')
                ->withTimestamps();
        }

        public function stockMovements()
        {
            return $this->hasMany(StockMovement::class);
        }

        protected static function booted()
        {
            static::created(function ($ingredient) {
                \App\Models\Stock::all()->each(function ($stock) use ($ingredient) {
                    $stock->ingredients()->attach($ingredient->id, ['quantity' => 0]);
                });
            });
        }

    }
