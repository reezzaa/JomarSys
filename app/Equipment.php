<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
     protected $fillable = [
      'EquipName',
      'TypeID',
      'EquipLeaser',
      'EquipKey',
      'EquipPrice',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $table = 'tblEquipment';
}