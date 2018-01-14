<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Material
 * 
 * @property int $id
 * @property int $MatClassID
 * @property int $MatUOM
 * @property string $MaterialName
 * @property string $MaterialBrand
 * @property string $MaterialSize
 * @property string $MaterialColor
 * @property string $MaterialDimension
 * @property float $MaterialUnitPrice
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \App\Detailuom $detailuom
 * @property \App\Materialclass $materialclass
 * @property \Illuminate\Database\Eloquent\Collection $servmaterials
 * @property \App\Stockcard $stockcard
 * @property \App\Stock $stock
 *
 * @package App
 */
class Material extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'MatClassID' => 'int',
		'MatUOM' => 'int',
		'MaterialUnitPrice' => 'float',
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'MatClassID',
		'MatUOM',
		'MaterialName',
		'MaterialBrand',
		'MaterialSize',
		'MaterialColor',
		'MaterialDimension',
		'MaterialUnitPrice',
		'status',
		'todelete'
	];

	public function detailuom()
	{
		return $this->belongsTo(\App\Detailuom::class, 'MatUOM');
	}

	public function materialclass()
	{
		return $this->belongsTo(\App\Materialclass::class, 'MatClassID');
	}

	public function servmaterials()
	{
		return $this->hasMany(\App\Servmaterial::class, 'MatID');
	}

	public function stockcard()
	{
		return $this->hasOne(\App\Stockcard::class, 'MatID');
	}

	public function stock()
	{
		return $this->hasOne(\App\Stock::class, 'MatID');
	}
}
