<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Stock
 * 
 * @property int $MatID
 * @property float $stocks
 * @property \Carbon\Carbon $date
 * 
 * @property \App\Material $material
 *
 * @package App
 */
class Stock extends Eloquent
{
	protected $primaryKey = 'MatID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MatID' => 'int',
		'stocks' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'stocks',
		'date'
	];

	public function material()
	{
		return $this->belongsTo(\App\Material::class, 'MatID');
	}
}
