<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'description','phone','mobile_phone', 'slug'];
    //cria a relação com o model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // criando a relação da loja com os produtos 1:N um para muitos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
