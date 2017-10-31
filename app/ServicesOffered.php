<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesOffered extends Model
{
    protected $fillable = [
      'strServiceOffName',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intServiceOffID';
    protected $table = 'tblServicesOffered';
}
