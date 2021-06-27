<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateCertification extends Model
{
  protected $guarded = [];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function CandidateResume(){
    return $this->belongsTo(CandidateResume::class);
  }
}
