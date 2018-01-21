<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.downdetails';
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
