<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipType extends Model
{
    protected $fillable = [
      'strEquipTypeDesc',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intEquipTypeID';
    protected $table = 'tblEquipType';
}
