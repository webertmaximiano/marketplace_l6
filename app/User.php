<?php
// relações
// 1:1 - usuario e loja - hasOne e belongsTo
// 1:N - Um para muitos (Loja e Produtos) hasMany e belongsTo
// N:N - muitos para muitos (Produtos e Categorias) belongsToMany
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // criando o relacionamento do model user com a store
    public function store() 
    {
        return $this->hasOne(Store::class);
    }
}
