<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
     protected $fillable = [
      'strEquipName',
      'intTypeID',
      'strEquipModel',
      'dblEquipWeight',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intEquipID';
    protected $table = 'tblEquipment';
}