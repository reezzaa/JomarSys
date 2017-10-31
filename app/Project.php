<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $fillable = [
      'intProjectID',
      'strProjectContractNo',
      'strProjectName',
      'strProjectDesc',
      // 'datProjectStart',
      // 'datProjectEnd',
      'strProjectStatus',
      'todelete'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intProjectID';
    protected $table = 'tblProj';
}
