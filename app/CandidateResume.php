<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateResume extends Model
{
    
  protected $guarded = [];
  
  public function user(){
      return $this->belongsTo(User::class);
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

  public function CandidateCertification(){
    return $this->hasMany(CandidateCertification::class);
  }
}
