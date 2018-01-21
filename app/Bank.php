<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:10 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bank
 * 
 * @property int $id
 * @property string $BankName
 * @property int $todelete
 * @property int $status
 *
 * @package App
 */
class Bank extends Eloquent
{
	protected $table = 'mydb.banks';
	public $timestamps = false;

	protected $casts = [
		'todelete' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'BankName',
		'todelete',
		'status'
	];
}
