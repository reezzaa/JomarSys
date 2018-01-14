<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detailuom
 * 
 * @property int $id
 * @property int $GroupUOMID
 * @property string $DetailUOMText
 * @property string $UOMUnitSymbol
 * @property bool $status
 * @property bool $todelete
 * 
 * @property \App\Groupuom $groupuom
 * @property \Illuminate\Database\Eloquent\Collection $materials
 *
 * @package App
 */
class Detailuom extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'GroupUOMID' => 'int',
		'status' => 'bool',
		'todelete' => 'bool'
	];

	protected $fillable = [
		'GroupUOMID',
		'DetailUOMText',
		'UOMUnitSymbol',
		'status',
		'todelete'
	];

	public function groupuom()
	{
		return $this->belongsTo(\App\Groupuom::class, 'GroupUOMID');
	}

	public function materials()
	{
		return $this->hasMany(\App\Material::class, 'MatUOM');
	}
}
