<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servfee
 * 
 * @property int $id
 * @property int $ServID
 * @property int $FeeID
 * @property int $todelete
 * 
 * @property \App\Fee $fee
 * @property \App\Servicesoffered $servicesoffered
 *
 * @package App
 */
class Servfee extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'FeeID' => 'int',
		'todelete' => 'int'
	];

	protected $fillable = [
		'ServID',
		'FeeID',
		'todelete'
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
