<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servtask
 * 
 * @property int $id
 * @property int $ServID
 * @property string $ServTask
 * @property float $duration
 * @property int $status
 * 
 * @property \App\Servicesoffered $servicesoffered
 * @property \App\Servtaskdue $servtaskdue
 *
 * @package App
 */
class Servtask extends Eloquent
{
	protected $table = 'mydb.servtasks';
	public $timestamps = false;

	protected $casts = [
		'ServID' => 'int',
		'duration' => 'float',
		'status' => 'int'
	];

	protected $fillable = [
		'ServID',
		'ServTask',
		'duration',
		'status'
	];

	public function servicesoffered()
	{
		return $this->belongsTo(\App\Servicesoffered::class, 'ServID');
	}

	public function servtaskdue()
	{
		return $this->hasOne(\App\Servtaskdue::class, 'ServTaskID');
	}
}
