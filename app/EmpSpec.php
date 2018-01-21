<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.empspecs';
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
