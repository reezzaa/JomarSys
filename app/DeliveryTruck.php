<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTruck extends Model
{
     protected $fillable = [
      'DeliTruckPlateNo',
      'DeliTruckVINNo',
      'DeliTruckCapacity',
      'DeliTruckGrossWeight',
      'todelete',
      'status',
      'active'
    ];
    public $timestamps = false;
    protected $table = 'tblDeliveryTruck';
}
