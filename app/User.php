<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone', 
        'email', 
        'feature_image', 
        'google_id', 
        'provider', 
        'provider_id', 
        'country', 
        'birthdate', 
        'describe_yourself', 
        'role', 
        'subscribe_newsletter', 
        'password',
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


    public function squads(){
        return $this->hasMany(Squad::class);
    }


    public function CandidateResume(){
      return $this->hasOne(CandidateResume::class);
    }

    public function CandidateSpecialist(){
      return $this->hasMany(CandidateSpecialist::class);
    }

    public function CandidateSkill(){
      return $this->hasMany(CandidateSkill::class);
    }

    public function CandidateWorkHistory(){
      return $this->hasMany(CandidateWorkHistory::class);
    }

    public function CandidateEducation(){
      return $this->hasMany(CandidateEducationalBackground::class);
    }

    public function CandidateCertification(){
      return $this->hasMany(CandidateCertification::class);
    }
}
