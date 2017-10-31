<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeIDUtil extends Model
{
    protected $fillable = [
      'strEmpIDUtil'
    ];
    public $timestamps = false;
    protected $primaryKey = 'strEmpIDUtil';
    protected $table = 'tblEmpIDUtil';
}
