<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servtaskdue
 * 
 * @property int $ServTaskID
 * @property \Carbon\Carbon $from
 * @property \Carbon\Carbon $to
 * 
 * @property \App\Servtask $servtask
 *
 * @package App
 */
class Servtaskdue extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ServTaskID' => 'int'
	];

	protected $dates = [
		'from',
		'to'
	];

	protected $fillable = [
		'ServTaskID',
		'from',
		'to'
	];

	public function servtask()
	{
		return $this->belongsTo(\App\Servtask::class, 'ServTaskID');
	}
}
