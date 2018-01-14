<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Downdetail
 * 
 * @property int $id
 * @property int $DownID
 * @property float $initialtax
 * @property float $taxValue
 * 
 * @property \App\Downpayment $downpayment
 *
 * @package App
 */
class Downdetail extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'DownID' => 'int',
		'initialtax' => 'float',
		'taxValue' => 'float'
	];

	protected $fillable = [
		'DownID',
		'initialtax',
		'taxValue'
	];

	public function downpayment()
	{
		return $this->belongsTo(\App\Downpayment::class, 'DownID');
	}
}
