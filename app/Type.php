<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.types';
	public $timestamps = false;

	protected $fillable = [
		'desc'
	];

	public function incurrences()
	{
		return $this->hasMany(\App\Incurrence::class, 'type');
	}
}
