<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tax
 * 
 * @property int $id
 * @property float $TaxValue
 * @property string $TaxDesc
 * @property int $todelete
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $downpayments
 * @property \Illuminate\Database\Eloquent\Collection $progressbills
 *
 * @package App
 */
class Tax extends Eloquent
{
	protected $table = 'mydb.taxes';
	public $timestamps = false;

	protected $casts = [
		'TaxValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'TaxValue',
		'TaxDesc',
		'todelete',
		'status'
	];

	public function downpayments()
	{
		return $this->hasMany(\App\Downpayment::class, 'TaxID');
	}

	public function progressbills()
	{
		return $this->hasMany(\App\Progressbill::class, 'TaxID');
	}
}
