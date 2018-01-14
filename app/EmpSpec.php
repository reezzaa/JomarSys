<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empspec
 * 
 * @property int $id
 * @property string $EmpID
 * @property int $SpecID
 * @property bool $todelete
 * 
 * @property \App\Employee $employee
 * @property \App\Specialization $specialization
 *
 * @package App
 */
class Empspec extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'SpecID' => 'int',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'EmpID',
		'SpecID',
		'todelete'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Employee::class, 'EmpID');
	}

	public function specialization()
	{
		return $this->belongsTo(\App\Specialization::class, 'SpecID');
	}
}
