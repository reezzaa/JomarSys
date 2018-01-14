<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Equiptype
 * 
 * @property int $id
 * @property string $EquipTypeDesc
 * @property bool $todelete
 * @property bool $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $equipment
 *
 * @package App
 */
class Equiptype extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'todelete' => 'bool',
		'status' => 'bool'
	];

	protected $fillable = [
		'EquipTypeDesc',
		'todelete',
		'status'
	];

	public function equipment()
	{
		return $this->hasMany(\App\Equipment::class, 'TypeID');
	}
}
