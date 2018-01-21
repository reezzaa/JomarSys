<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Payment
 * 
 * @property string $OrID
 * @property string $InvID
 * @property float $amountpaid
 * @property \Carbon\Carbon $date
 * @property float $change
 * @property string $remarks
 * 
 * @property \App\Serviceinvoiceheader $serviceinvoiceheader
 *
 * @package App
 */
class Payment extends Eloquent
{
	protected $table = 'mydb.payments';
	protected $primaryKey = 'OrID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'amountpaid' => 'float',
		'change' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'InvID',
		'amountpaid',
		'date',
		'change',
		'remarks'
	];

	public function serviceinvoiceheader()
	{
		return $this->belongsTo(\App\Serviceinvoiceheader::class, 'InvID');
	}
}
