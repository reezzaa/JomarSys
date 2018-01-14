<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empidutil
 * 
 * @property string $strEmpIDUtil
 *
 * @package App
 */
class Empidutil extends Eloquent
{
	protected $primaryKey = 'strEmpIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
