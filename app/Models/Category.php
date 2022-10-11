<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Tudo que for enviado por post pode ser alterado, se colocar algum campo no array
    //o laravel não deixaria atualizar no banco
    protected $guarded = [];
    
    // A categoria tem muitos produtos
    public function products() {
        return $this->hasMany('App\Models\Produts');
    }
}
