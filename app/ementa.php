<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ementa extends Model
{
    protected $guarded = [];

    protected $table = 'ementas';
    protected $primaryKey = 'id_ementa';

     //protected $primaryKey = 'id_ementa';

    public function scopeTitulo_ementa($query,$id)
    {
        return $query->where('id_ementa', '=', $id);
    }

   


    
}
