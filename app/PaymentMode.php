<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Paymentmode
 * 
 * @property int $id
 * @property float $ModeValue
 * @property int $todelete
 * @property int $status
 *
 * @package App
 */
class Paymentmode extends Eloquent
{
	protected $table = 'mydb.paymentmodes';
	public $timestamps = false;

	protected $casts = [
		'ModeValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'ModeValue',
		'todelete',
		'status'
	];
}
