<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //

    public function getUserInfo()
    {
        return $this->belongsTo('\App\User','u_id_fk');
    }

    public function getProductsInfo()
    {
        return $this->belongsTo('\App\Model\Product','pro_id_fk');
    }

    public function getTransactionsInfo()
    {
        return $this->belongsTo('\App\Model\Transactions','trans_id_fk');
    }
}
