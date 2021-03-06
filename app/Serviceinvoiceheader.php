<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Serviceinvoiceheader
 * 
 * @property string $id
 * @property string $date
 * @property string $status
 * @property string $duedate
 * 
 * @property \Illuminate\Database\Eloquent\Collection $payments
 * @property \App\Serviceinvoicedetail $serviceinvoicedetail
 *
 * @package App
 */
class Serviceinvoiceheader extends Eloquent
{
	protected $table = 'mydb.serviceinvoiceheaders';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'date',
		'status',
		'duedate'
	];

	public function payments()
	{
		return $this->hasMany(\App\Payment::class, 'InvID');
	}

	public function serviceinvoicedetail()
	{
		return $this->hasOne(\App\Serviceinvoicedetail::class, 'InvID');
	}
}
