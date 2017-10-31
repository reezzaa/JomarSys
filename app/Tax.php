<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    //
    protected $table = 'tblTax';
	protected $primaryKey = 'intTaxID';
	public $timestamps = false;
}
