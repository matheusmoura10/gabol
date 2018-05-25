<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\indicacao;
use App\models\despacho_status;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lista_ementa(){

        return $this->hasMany(ementa::class, 'id_dominio_ementa','id_dominio_users');
    }

     public function lista_ementa_disponivel() {
        return $this->lista_ementa()->where('status_ementa','=', 1);
    }

    public function lista_despacho(){

        return $this->hasMany(despacho_status::class, 'id_dominio_despacho','id_dominio_users');
    }

    public function lista_despacho_id($id_tramite_status) {
        return $this->lista_despacho()->where('status_tramite','=', $id_tramite_status);
    }

    public function retorna_dados_configuracao(){
        return $this->hasOne(models\config_aplicacao::class,'id_aplicacao','id_dominio_users');
    }

}
