<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.materialtypes';
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
