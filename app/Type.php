<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['requirement_ids','type'];


    public function schedule(){

        return $this->hasMany('App\Schedule','type_id');
    }
}
