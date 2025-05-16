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

        protected static function booted()
        {
            static::created(function ($ingredient) {
                $ingredient->stocks()->attach(1, ['quantity' => 0]);
            });
        }
    }
