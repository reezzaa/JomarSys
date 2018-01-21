<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.stocks';
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
