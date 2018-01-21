<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Groupuom
 * 
 * @property int $id
 * @property string $GroupUOMText
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \Illuminate\Database\Eloquent\Collection $detailuoms
 *
 * @package App
 */
class Groupuom extends Eloquent
{
	protected $table = 'mydb.groupuoms';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'GroupUOMText',
		'status',
		'todelete'
	];

	public function detailuoms()
	{
		return $this->hasMany(\App\Detailuom::class, 'GroupUOMID');
	}
}
