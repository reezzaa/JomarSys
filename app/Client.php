<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'strClientID',
      'strClientType',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'strClientID';
    protected $table = 'tblClient';
}
