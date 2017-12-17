<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'EmpLastName',
      'EmpMiddleName',
      'EmpFirstName',
      'EmpEmail',
      'EmpContactNo',
      'EmpCity',
      'EmpProvince',
      'EmpSpecID',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'tblemployee';
}