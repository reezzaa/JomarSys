<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Operation
 * 
 * @property int $id
 * @property string $username
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $suffix
 * @property string $email
 * @property string $password
 * @property int $active
 * @property int $status
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Operation extends Authenticatable
{
	protected $casts = [
		'active' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'fname',
		'mname',
		'lname',
		'suffix',
		'email',
		'password',
		'active',
		'status',
		'remember_token'
	];

	protected $table = 'mydb.operations';
}
