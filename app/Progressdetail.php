<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Progressdetail
 * 
 * @property int $id
 * @property float $recValue
 * @property float $retValue
 * @property float $initial
 * @property float $initialtax
 * @property float $taxValue
 * @property int $PB_ID
 * 
 * @property \App\Progressbill $progressbill
 *
 * @package App
 */
class Progressdetail extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'recValue' => 'float',
		'retValue' => 'float',
		'initial' => 'float',
		'initialtax' => 'float',
		'taxValue' => 'float',
		'PB_ID' => 'int'
	];

	protected $fillable = [
		'recValue',
		'retValue',
		'initial',
		'initialtax',
		'taxValue',
		'PB_ID'
	];

	public function progressbill()
	{
		return $this->belongsTo(\App\Progressbill::class, 'PB_ID');
	}
}
