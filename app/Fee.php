<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Fee
 * 
 * @property int $id
 * @property string $FeeDesc
 * @property float $FeeValue
 * @property int $todelete
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $servfees
 * @property \App\Servmatfee $servmatfee
 * @property \App\Servwfee $servwfee
 *
 * @package App
 */
class Fee extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'FeeValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'FeeDesc',
		'FeeValue',
		'todelete',
		'status'
	];

	public function servfees()
	{
		return $this->hasMany(\App\Servfee::class, 'FeeID');
	}

	public function servmatfee()
	{
		return $this->hasOne(\App\Servmatfee::class, 'FeeID');
	}

	public function servwfee()
	{
		return $this->hasOne(\App\Servwfee::class, 'FeeID');
	}
}
