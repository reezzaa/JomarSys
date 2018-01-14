<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Budgetdepartment
 * 
 * @property int $id
 * @property string $username
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $suffix
 * @property int $active
 * @property int $status
 * @property string $email
 * @property string $password
 * @property string $remember_token
 *
 * @package App
 */
class BudgetDepartment extends Authenticatable
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
		'active',
		'status',
		'email',
		'password',
		'remember_token'
	];
}
