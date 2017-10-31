<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatNeed extends Model
{
    protected $fillable = [
      'intQHID',
      'intMaterialID',
      'intQty',
      'dcmUnitCost'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intMatNeedID';
    protected $table = 'tblMatNeed';
}
