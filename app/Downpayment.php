<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Downpayment
 * 
 * @property int $id
 * @property float $amount
 * @property int $status
 * @property int $TaxID
 * 
 * @property \App\Tax $tax
 * @property \Illuminate\Database\Eloquent\Collection $downdetails
 *
 * @package App
 */
class Downpayment extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'status' => 'int',
		'TaxID' => 'int'
	];

	protected $fillable = [
		'amount',
		'status',
		'TaxID'
	];

	public function tax()
	{
		return $this->belongsTo(\App\Tax::class, 'TaxID');
	}

	public function downdetails()
	{
		return $this->hasMany(\App\Downdetail::class, 'DownID');
	}
}
