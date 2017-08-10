<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    public function getCategory()
    {
        return $this->belongsTo('\App\Model\Category','cat_id_fk');
    }

    public function defaultImage()
    {
        return $this->hasOne('\App\Model\ProductImage','pro_id_fk')->where('default_image','=','1');
    }

    public function getUser()
    {
        return $this->belongsTo('\App\User','u_id_fk');
    }

}
