<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTruck extends Model
{
     protected $fillable = [
      'strDeliTruckPlateNo',
      'strDeliTruckVINNo',
      'dblDeliTruckCapacity',
      'dblDeliTruckGrossWeight',
      'todelete',
      'status',
      'active'
    ];
    public $timestamps = false;
    protected $primaryKey = 'intDeliTruckID';
    protected $table = 'tblDeliveryTruck';
}
