<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    //
    protected $table = 'tblRetention';
	protected $primaryKey = 'intRetID';
	public $timestamps = false;
}
