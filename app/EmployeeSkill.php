<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
  protected $guarded = [];

  public function employeeRoles(){
    return $this->belongsToMany(EmployeeRole::class);
  }
}
