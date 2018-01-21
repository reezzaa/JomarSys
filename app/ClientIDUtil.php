<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:10 +0000.
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
	protected $table = 'mydb.clientidutils';
	protected $primaryKey = 'strClientIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
