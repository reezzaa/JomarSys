<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servequip
 * 
 * @property int $id
 * @property int $ServID
 * @property int $EquipID
 * @property int $todelete
 * 
 * @property \App\Equipment $equipment
 * @property \App\Servicesoffered $servicesoffered
 *
 * @package App
 */
class Servequip extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'EquipID' => 'int',
		'todelete' => 'int'
	];

	protected $fillable = [
		'ServID',
		'EquipID',
		'todelete'
	];

	public function equipment()
	{
		return $this->belongsTo(\App\Equipment::class, 'EquipID');
	}

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}
}
