<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCertification extends Model
{
    protected $table = 'certifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'institute', 'user_id'
    ];
}
