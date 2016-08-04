<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'requirements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['requirement'];
}
