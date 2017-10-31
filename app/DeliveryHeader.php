<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryHeader extends Model
{
    //
    protected $table = 'tblDeliveryHeader';
	protected $primaryKey = 'strDeliveryHID';
	public $timestamps = false;
}
