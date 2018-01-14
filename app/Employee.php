<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property string $id
 * @property string $EmpLname
 * @property string $EmpMname
 * @property string $EmpFname
 * @property string $EmpContactNo
 * @property string $EmpCity
 * @property string $EmpProvince
 * @property string $EmpEmail
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \Illuminate\Database\Eloquent\Collection $empspecs
 *
 * @package App
 */
class Employee extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'EmpLname',
		'EmpMname',
		'EmpFname',
		'EmpContactNo',
		'EmpCity',
		'EmpProvince',
		'EmpEmail',
		'status',
		'todelete'
	];

	public function empspecs()
	{
		return $this->hasMany(\App\Empspec::class, 'EmpID');
	}
}
