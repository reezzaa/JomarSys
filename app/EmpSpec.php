<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpSpec extends Model
{
   protected $fillable = [
      'EmpID',
      'SpecID',
    ];
    public $timestamps = false;
    protected $table = 'tblempspec';
}
