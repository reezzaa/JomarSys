<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Projectmanager
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $suffix
 * @property int $active
 * @property int $status
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Projectmanager extends Authenticatable
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
		'email',
		'password',
		'fname',
		'mname',
		'lname',
		'suffix',
		'active',
		'status',
		'remember_token'
	];
}
