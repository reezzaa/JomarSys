<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicesoffered
 * 
 * @property int $id
 * @property string $ServiceOffName
 * @property float $duration
 * @property string $remarks
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \Illuminate\Database\Eloquent\Collection $servequips
 * @property \Illuminate\Database\Eloquent\Collection $servfees
 * @property \Illuminate\Database\Eloquent\Collection $servmaterials
 * @property \App\Servmatfee $servmatfee
 * @property \Illuminate\Database\Eloquent\Collection $servtasks
 * @property \App\Servtotal $servtotal
 * @property \Illuminate\Database\Eloquent\Collection $servworkers
 *
 * @package App
 */
class Servicesoffered extends Eloquent
{
	protected $table = 'mydb.servicesoffered';
	public $timestamps = false;

	protected $casts = [
		'duration' => 'float',
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'ServiceOffName',
		'duration',
		'remarks',
		'status',
		'todelete'
	];

	public function servequips()
	{
		return $this->hasMany(\App\Servequip::class, 'ServID');
	}

	public function servfees()
	{
		return $this->hasMany(\App\Servfee::class, 'ServID');
	}

	public function servmaterials()
	{
		return $this->hasMany(\App\Servmaterial::class, 'ServID');
	}

	public function servmatfee()
	{
		return $this->hasOne(\App\Servmatfee::class, 'ServID');
	}

	public function servtasks()
	{
		return $this->hasMany(\App\Servtask::class, 'ServID');
	}

	public function servtotal()
	{
		return $this->hasOne(\App\Servtotal::class, 'ServID');
	}

	public function servworkers()
	{
		return $this->hasMany(\App\Servworker::class, 'ServID');
	}
}
