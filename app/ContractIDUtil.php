<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:10 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Contractidutil
 * 
 * @property string $strContractIDUtil
 *
 * @package App
 */
class Contractidutil extends Eloquent
{
	protected $table = 'mydb.contractidutils';
	protected $primaryKey = 'strContractIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
