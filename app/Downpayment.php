<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downpayment extends Model
{
    //
    protected $table = 'tblDownpayment';
	protected $primaryKey = 'intDownID';
	public $timestamps = false;
}
