<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'price',
        'image',
        'quantity',
    ];

    public function isAvailable(): bool
    {
        return $this->quantity > 0;
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
