<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
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
