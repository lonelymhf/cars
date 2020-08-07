<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {
    protected $fillable
        = ['name_ar', 'name_en', 'capacity',];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
