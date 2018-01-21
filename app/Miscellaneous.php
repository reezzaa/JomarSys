<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Miscellaneous
 * 
 * @property int $id
 * @property string $MiscDesc
 * @property float $MiscValue
 * @property int $todelete
 * @property int $status
 *
 * @package App
 */
class Miscellaneous extends Eloquent
{
	protected $table = 'mydb.miscellaneous';
	public $timestamps = false;

	protected $casts = [
		'MiscValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'MiscDesc',
		'MiscValue',
		'todelete',
		'status'
	];
}
