<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpSpec extends Model
{
   protected $fillable = [
      'strESEmpID',
      'intESSpecID',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intEmpSpecID';
    protected $table = 'tblempspec';
}
