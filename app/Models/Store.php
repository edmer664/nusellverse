<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'description',
        'rating',
        'order_instructions',
    ];

    public function storeSocials()
    {
        return $this->hasMany(StoreSocial::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
