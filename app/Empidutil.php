<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
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
	protected $table = 'mydb.empidutils';
	protected $primaryKey = 'strEmpIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
