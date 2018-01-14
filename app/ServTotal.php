<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
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
