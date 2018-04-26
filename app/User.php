<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function lista_ementa(){

        return $this->hasMany(ementa::class, 'id_dominio_ementa','id_dominio_users');
    }

     public function lista_ementa_disponivel() {
        return $this->lista_ementa()->where('status_ementa','=', 1);
    }

    public function retorna_dados_configuracao(){
        return $this->hasOne(models\config_aplicacao::class,'id_aplicacao','id_dominio_users');
    }
}
