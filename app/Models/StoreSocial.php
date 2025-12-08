<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreSocial extends Model
{
    protected $fillable = [
        'store_id',
        'platform',
        'link',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
