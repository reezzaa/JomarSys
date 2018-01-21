<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:10 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Client
 * 
 * @property string $id
 * @property string $image
 * @property string $name
 * @property string $representative
 * @property string $position
 * @property string $TIN
 * @property string $contactno
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $prov
 *
 * @package App
 */
class Client extends Eloquent
{
	protected $table = 'mydb.clients';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'image',
		'name',
		'representative',
		'position',
		'TIN',
		'contactno',
		'email',
		'address',
		'city',
		'prov'
	];
}
