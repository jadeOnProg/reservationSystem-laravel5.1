<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservations';



    public function user(){

        return $this->belongsTo('App\User','user_id');
    }

    public function type(){

        return $this->belongsTo('App\Type','type_id');
    }

    public function schedule(){

        return $this->belongsTo('App\Schedule','schedule_id');
    }
}
