<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesOffered extends Model
{
    protected $fillable = [
      'ServiceOffName',
      'todelete',
      'status',
      'duration',
      'unit',
      'ServiceDesc',
      
    ];
    public $timestamps = false;
    protected $table = 'tblServicesOffered';
}
