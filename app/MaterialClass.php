<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialClass extends Model
{
    protected $fillable = [
      'strMatClassName',
      'intMaterialTypeID',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intMatClassID';
    protected $table = 'tblMaterialClass';
}
