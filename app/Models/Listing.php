<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'video_url',
        'city',
        'address',
        'amount',
        'intervals',
        'tags',
        'status',
        'property_type',
        'units_left',
        'other_images',
        'is_active',
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
