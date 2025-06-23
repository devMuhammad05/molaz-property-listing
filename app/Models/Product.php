<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'image',
        'slug',
        'category',
        'amount',
        'description',
        'city',
        'condition',
        'seller',
        'is_active',
        'units_left',
        'other_images',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
