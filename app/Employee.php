<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'strEmpID',
      'strEmpLastName',
      'strEmpMiddleName',
      'strEmpFirstName',
      'strEmpEmail',
      'strEmpContactNo',
      'strEmpCity',
      'strEmpProvince',
      'intEmpSpecID',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'strEmpID';
    public $incrementing = false;
    protected $table = 'tblEmployee';
}