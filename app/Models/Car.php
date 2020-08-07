<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'plate',
        'chassis',
        'model',
        'year',
        'owner_name',
        'store_id',
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
