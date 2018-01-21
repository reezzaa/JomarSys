<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servtotal
 * 
 * @property int $ServID
 * @property float $total
 * 
 * @property \App\Servicesoffered $servicesoffered
 *
 * @package App
 */
class Servtotal extends Eloquent
{
	protected $table = 'mydb.servtotals';
	protected $primaryKey = 'ServID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'total'
	];

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}
}
