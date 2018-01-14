<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Progressbill
 * 
 * @property int $id
 * @property int $progress
 * @property int $status
 * @property float $amount
 * @property int $TaxID
 * @property int $RecID
 * @property int $RetID
 * 
 * @property \App\Recoupment $recoupment
 * @property \App\Retention $retention
 * @property \App\Tax $tax
 * @property \Illuminate\Database\Eloquent\Collection $progressdetails
 *
 * @package App
 */
class Progressbill extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'progress' => 'int',
		'status' => 'int',
		'amount' => 'float',
		'TaxID' => 'int',
		'RecID' => 'int',
		'RetID' => 'int'
	];

	protected $fillable = [
		'progress',
		'status',
		'amount',
		'TaxID',
		'RecID',
		'RetID'
	];

	public function recoupment()
	{
		return $this->belongsTo(\App\Recoupment::class, 'RecID');
	}

	public function retention()
	{
		return $this->belongsTo(\App\Retention::class, 'RetID');
	}

	public function tax()
	{
		return $this->belongsTo(\App\Tax::class, 'TaxID');
	}

	public function progressdetails()
	{
		return $this->hasMany(\App\Progressdetail::class, 'PB_ID');
	}
}
