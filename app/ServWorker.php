<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servworker
 * 
 * @property int $id
 * @property int $ServID
 * @property int $SpecID
 * @property int $todelete
 * @property int $quantity
 * 
 * @property \App\Servicesoffered $servicesoffered
 * @property \App\Specialization $specialization
 * @property \App\Servwfee $servwfee
 *
 * @package App
 */
class Servworker extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'SpecID' => 'int',
		'todelete' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'ServID',
		'SpecID',
		'todelete',
		'quantity'
	];

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}

	public function specialization()
	{
		return $this->belongsTo(\App\Specialization::class, 'SpecID');
	}

	public function servwfee()
	{
		return $this->hasOne(\App\Servwfee::class, 'ServWID');
	}
}
