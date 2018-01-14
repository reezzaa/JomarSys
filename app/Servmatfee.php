<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servmatfee
 * 
 * @property int $ServID
 * @property int $FeeID
 * @property float $amount
 * 
 * @property \App\Fee $fee
 * @property \App\Servicesoffered $servicesoffered
 *
 * @package App
 */
class Servmatfee extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'FeeID' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'ServID',
		'FeeID',
		'amount'
	];

	public function fee()
	{
		return $this->belongsTo(\App\Fee::class, 'FeeID');
	}

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}
}
