<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rate
 * 
 * @property int $id
 * @property string $RateDesc
 * @property float $RateValue
 * @property int $todelete
 * @property int $status
 *
 * @package App
 */
class Rate extends Eloquent
{
	protected $table = 'mydb.rates';
	public $timestamps = false;

	protected $casts = [
		'RateValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'RateDesc',
		'RateValue',
		'todelete',
		'status'
	];
}
