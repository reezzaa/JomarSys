<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteIndDetail extends Model
{
    //
    protected $table = 'tblQuoteIndDetail';
    protected $primaryKey = 'strQuoteID';
	public $timestamps = false;
}
