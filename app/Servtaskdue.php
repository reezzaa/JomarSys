<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.servtaskdues';
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
