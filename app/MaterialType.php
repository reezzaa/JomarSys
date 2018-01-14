<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Materialtype
 * 
 * @property int $id
 * @property string $MatTypeName
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \Illuminate\Database\Eloquent\Collection $materialclasses
 *
 * @package App
 */
class Materialtype extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'MatTypeName',
		'status',
		'todelete'
	];

	public function materialclasses()
	{
		return $this->hasMany(\App\Materialclass::class, 'MatTypeID');
	}
}
