<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servdelivery
 * 
 * @property int $id
 * @property string $tblservdeliverycol
 *
 * @package App
 */
class Servdelivery extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'tblservdeliverycol'
	];
}
