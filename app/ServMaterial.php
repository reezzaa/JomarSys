<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servmaterial
 * 
 * @property int $id
 * @property int $ServID
 * @property int $MatID
 * @property int $todelete
 * @property int $quantity
 * 
 * @property \App\Material $material
 * @property \App\Servicesoffered $servicesoffered
 *
 * @package App
 */
class Servmaterial extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'MatID' => 'int',
		'todelete' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'ServID',
		'MatID',
		'todelete',
		'quantity'
	];

	public function material()
	{
		return $this->belongsTo(\App\Material::class, 'MatID');
	}

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}
}
