<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Incurrence
 * 
 * @property int $id
 * @property string $desc
 * @property float $amount
 * @property string $user
 * @property \Carbon\Carbon $date
 * @property int $type
 * 
 *
 * @package App
 */
class Incurrence extends Eloquent
{
	protected $table = 'mydb.incurrences';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'type' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'desc',
		'amount',
		'user',
		'date',
		'type'
	];

	public function type()
	{
		return $this->belongsTo(\App\Type::class, 'type');
	}
}
