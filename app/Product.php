<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protege os campos a serem manipulados
    protected $fillable = ['name', 'description', 'body','price', 'slug'];
    //criando a relação com a loja N:1 muitos para 1 pertence a loja
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    //relação dos produtos com as categorias
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
