<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $dates = ['validity'];
    //Tudo que for enviado por post pode ser alterado, se colocar algum campo no array
    //o laravel não deixaria atualizar no banco
    protected $guarded = [];

    // O produto tem uma categoria
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}

//php artisan make:model Product