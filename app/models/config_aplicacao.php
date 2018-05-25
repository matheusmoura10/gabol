<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\ementa;
use App\indicacao;

class config_aplicacao extends Model
{
    protected $table = 'config_aplicacao';
    protected $primaryKey = 'id_aplicacao';
	

    public function ementas(){

    	return $this->hasMany(ementa::class);
    }

    public function users()
    {
    	return $this->hasMany(user::class);
    }
}
