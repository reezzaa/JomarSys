<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailUOM extends Model
{
    protected $fillable = [
      'intGroupUOMID',
      'strDetailUOMText',
      'strUOMUnitSymbol',
      'status',
      'todelete'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intDetailUOMID';
    protected $table = 'tblDetailUOM';
}
