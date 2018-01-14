<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Equipment
 * 
 * @property int $id
 * @property int $TypeID
 * @property string $EquipName
 * @property string $EquipLeaser
 * @property string $EquipKey
 * @property bool $status
 * @property bool $todelete
 * @property float $EquipPrice
 * 
 * @property \App\Equiptype $equiptype
 * @property \Illuminate\Database\Eloquent\Collection $servequips
 *
 * @package App
 */
class Equipment extends Eloquent
{
	protected $table = 'equipments';
	public $timestamps = false;

	protected $casts = [
		'TypeID' => 'int',
		'status' => 'bool',
		'todelete' => 'bool',
		'EquipPrice' => 'float'
	];

	protected $fillable = [
		'TypeID',
		'EquipName',
		'EquipLeaser',
		'EquipKey',
		'status',
		'todelete',
		'EquipPrice'
	];

	public function equiptype()
	{
		return $this->belongsTo(\App\Equiptype::class, 'TypeID');
	}

	public function servequips()
	{
		return $this->hasMany(\App\Servequip::class, 'EquipID');
	}
}
