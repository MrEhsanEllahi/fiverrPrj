<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passion extends Model
{
    protected $table = 'passions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
