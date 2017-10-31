<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipNeed extends Model
{
     protected $fillable = [
      'intQDID',
      'intEquipID',
      'dcmUnitPrice',
      'dcmUnitCost',
      'intQty'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intEquipNeedID';
    protected $table = 'tblEquipNeed';
}
