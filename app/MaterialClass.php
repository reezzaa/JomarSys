<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Materialclass
 * 
 * @property int $id
 * @property int $MatTypeID
 * @property string $MatClassName
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \App\Materialtype $materialtype
 * @property \Illuminate\Database\Eloquent\Collection $materials
 *
 * @package App
 */
class Materialclass extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'MatTypeID' => 'int',
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'MatTypeID',
		'MatClassName',
		'status',
		'todelete'
	];

	public function materialtype()
	{
		return $this->belongsTo(\App\Materialtype::class, 'MatTypeID');
	}

	public function materials()
	{
		return $this->hasMany(\App\Material::class, 'MatClassID');
	}
}
