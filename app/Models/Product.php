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
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
