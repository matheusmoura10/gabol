<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\config_aplicacao;

class indicacao extends Model
{
	protected $primaryKey = 'id_indicacao';

   public function sistema_config()
   {
   	 return $this->HasOne(config_aplicacao::class,'id_aplicacao','id_sistema_indicacao');
   }

   public function ementas_indicacao(){

   	return $this->hasMany(ementa::class,'id_ementa','ementa_indicacao');
   }
    
}
