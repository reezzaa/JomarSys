<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpNeed extends Model
{
    protected $fillable = [
      'intQDID',
      'intSpecID',
      'dcmrate',
      'dcmhour',
      'intQty',
      'dcmTotLaborCost'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intEmpNeedID';
    protected $table = 'tblEmpNeed';
}
