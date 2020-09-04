<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'cellphone', 'work_email', 'occupation', 'industry', 'passion', 'ugrad_name', 'ugrad_major', 'grad_inst_name', 'grad_major', 'mentor', 'activate', 'role', 'email', 'opportunity', 'need', 'job_details', 'passion', 'board_ms', 'organization_ms', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills(){
        return $this->hasMany(UserSkill::class);
    }

    public function hobbies(){
        return $this->hasMany(UserHobby::class);
    }

    public function interests(){
        return $this->hasMany(UserInterest::class);
    }

    public function certifications(){
        return $this->hasMany(UserCertification::class);
    }
}
