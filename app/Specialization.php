<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Specialization
 * 
 * @property int $id
 * @property string $SpecDesc
 * @property bool $todelete
 * @property bool $status
 * @property float $rpd
 * 
 * @property \Illuminate\Database\Eloquent\Collection $empspecs
 * @property \Illuminate\Database\Eloquent\Collection $servworkers
 *
 * @package App
 */
class Specialization extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'todelete' => 'bool',
		'status' => 'bool',
		'rpd' => 'float'
	];

	protected $fillable = [
		'SpecDesc',
		'todelete',
		'status',
		'rpd'
	];

	public function empspecs()
	{
		return $this->hasMany(\App\Empspec::class, 'SpecID');
	}

	public function servworkers()
	{
		return $this->hasMany(\App\Servworker::class, 'SpecID');
	}
}
