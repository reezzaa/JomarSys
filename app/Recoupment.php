<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recoupment extends Model
{
    //
    protected $table = 'tblRecoupment';
	protected $primaryKey = 'intRecID';
	public $timestamps = false;
}
