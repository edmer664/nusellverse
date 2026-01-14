<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'store_id',
        'rating',
        'comment',
        'ip_address',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
