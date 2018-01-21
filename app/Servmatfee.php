<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.servmatfees';
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
