<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $dates = ['validity'];

    // O produto tem uma categoria
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}

//php artisan make:model Product