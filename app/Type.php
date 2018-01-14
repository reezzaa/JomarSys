<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Type
 * 
 * @property int $id
 * @property string $desc
 * 
 * @property \Illuminate\Database\Eloquent\Collection $incurrences
 *
 * @package App
 */
class Type extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'desc'
	];

	public function incurrences()
	{
		return $this->hasMany(\App\Incurrence::class, 'type');
	}
}
