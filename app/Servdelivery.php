<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.servdeliveries';
	public $timestamps = false;

	protected $fillable = [
		'tblservdeliverycol'
	];
}
