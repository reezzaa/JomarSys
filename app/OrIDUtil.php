<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Oridutil
 * 
 * @property string $strOrIDUtil
 *
 * @package App
 */
class Oridutil extends Eloquent
{
	protected $table = 'mydb.oridutils';
	protected $primaryKey = 'strOrIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
