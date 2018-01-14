<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Deliverytruck
 * 
 * @property int $id
 * @property string $DeliTruckPlateNo
 * @property string $DeliTruckVINNo
 * @property float $DeliTruckCapacity
 * @property float $DeliTruckGrossWeight
 * @property bool $todelete
 * @property bool $status
 * @property int $active
 *
 * @package App
 */
class Deliverytruck extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'DeliTruckCapacity' => 'float',
		'DeliTruckGrossWeight' => 'float',
		'todelete' => 'bool',
		'status' => 'bool',
		'active' => 'int'
	];

	protected $fillable = [
		'DeliTruckPlateNo',
		'DeliTruckVINNo',
		'DeliTruckCapacity',
		'DeliTruckGrossWeight',
		'todelete',
		'status',
		'active'
	];
}
