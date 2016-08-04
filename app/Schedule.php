<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedules';

    public function type(){

        return $this->belongsTo('App\Type','type_id');
    }
}
