<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.equiptypes';
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
