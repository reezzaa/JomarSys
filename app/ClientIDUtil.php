<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Clientidutil
 * 
 * @property string $strClientIDUtil
 *
 * @package App
 */
class Clientidutil extends Eloquent
{
	protected $primaryKey = 'strClientIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
