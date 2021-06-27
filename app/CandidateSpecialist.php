<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateSpecialist extends Model
{
  protected $guarded = [];
  
  public function user(){
      return $this->belongsTo(User::class);
  }

  public function resume(){
      return $this->belongsTo(CandidateResume::class);
  }
}
