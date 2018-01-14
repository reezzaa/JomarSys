<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
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
	protected $primaryKey = 'strContractIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
