<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servwfee
 * 
 * @property int $ServWID
 * @property int $FeeID
 * @property float $amount
 * 
 * @property \App\Fee $fee
 * @property \App\Servworker $servworker
 *
 * @package App
 */
class Servwfee extends Eloquent
{
	protected $table = 'mydb.servwfees';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ServWID' => 'int',
		'FeeID' => 'int',
		'amount' => 'float'
	];

	protected $fillable = [
		'ServWID',
		'FeeID',
		'amount'
	];

	public function fee()
	{
		return $this->belongsTo(\App\Fee::class, 'FeeID');
	}

	public function servworker()
	{
		return $this->belongsTo(\App\Servworker::class, 'ServWID');
	}
}
