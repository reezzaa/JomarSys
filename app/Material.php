<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
      'intMatClassID',
      'intMatUOM',
      'strMaterialName',
      'strMaterialBrand',
      'strMaterialSize',
      'strMaterialColor',
      'strMaterialDimension',
      'dcmMaterialUnitPrice',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intMaterialID';
    protected $table = 'tblmaterial';
}
