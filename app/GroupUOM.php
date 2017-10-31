<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUOM extends Model
{
    protected $fillable = [
      'strGroupUOMText',
      'status',
      'todelete'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intGroupUOMID';
    protected $table = 'tblGroupUOM';
}
