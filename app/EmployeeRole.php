<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
  protected $guarded = [];

  public function employeeSkills(){
    return $this->belongsToMany(EmployeeSkill::class);
  }
}
