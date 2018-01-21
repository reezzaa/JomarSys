<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Serviceinvoicedetail
 * 
 * @property string $InvID
 * @property float $amount
 * 
 * @property \App\Serviceinvoiceheader $serviceinvoiceheader
 *
 * @package App
 */
class Serviceinvoicedetail extends Eloquent
{
	protected $table = 'mydb.serviceinvoicedetails';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'InvID',
		'amount'
	];

	public function serviceinvoiceheader()
	{
		return $this->belongsTo(\App\Serviceinvoiceheader::class, 'InvID');
	}
}
