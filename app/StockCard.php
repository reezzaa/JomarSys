<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Stockcard
 * 
 * @property int $MatID
 * @property float $quantity
 * @property \Carbon\Carbon $date
 * @property string $method
 * @property float $stock
 * @property float $cost
 * @property float $totalcost
 * 
 * @property \App\Material $material
 *
 * @package App
 */
class Stockcard extends Eloquent
{
	protected $table = 'mydb.stockcards';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MatID' => 'int',
		'quantity' => 'float',
		'stock' => 'float',
		'cost' => 'float',
		'totalcost' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'MatID',
		'quantity',
		'date',
		'method',
		'stock',
		'cost',
		'totalcost'
	];

	public function material()
	{
		return $this->belongsTo(\App\Material::class, 'MatID');
	}
}
