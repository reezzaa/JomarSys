<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
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
	protected $primaryKey = 'strOrIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
