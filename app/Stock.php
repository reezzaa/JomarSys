<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'tblStocks';
	protected $primaryKey = 'intMaterialID';
	public $timestamps = false;
}
