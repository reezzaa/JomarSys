<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipType extends Model
{
    protected $fillable = [
      'EquipTypeDesc',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $table = 'tblEquipType';
}
