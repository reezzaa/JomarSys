<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressBilling extends Model
{
    //
    protected $table = 'tblProgressBill';
	protected $primaryKey = 'intPBID';
	public $timestamps = false;
    
}
