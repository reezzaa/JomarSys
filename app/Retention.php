<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Retention
 * 
 * @property int $id
 * @property float $RetValue
 * @property int $todelete
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $progressbills
 *
 * @package App
 */
class Retention extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'RetValue' => 'float',
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'RetValue',
		'todelete',
		'status'
	];

	public function progressbills()
	{
		return $this->hasMany(\App\Progressbill::class, 'RetID');
	}
}
