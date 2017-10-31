<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryIDUtil extends Model
{
    //
    protected $fillable = [
      'strDeliveryIDUtil'
    ];
    public $timestamps = false;
    protected $primaryKey = 'strDeliveryIDUtil';
    protected $table = 'tblDeliveryIDUtil';
}
