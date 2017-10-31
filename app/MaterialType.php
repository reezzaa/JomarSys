<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    protected $fillable = [
      'strMatTypeName',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intMatTypeID';
    protected $table = 'tblMaterialType';
}
