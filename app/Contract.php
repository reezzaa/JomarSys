<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{

	 protected $fillable = [
      'strContractID',
      'strConQuoteID',  
      'intDownpaymentID',
      'dblProgOverall',
      'status',
      'todelete',
    ];
    public $timestamps =false;
    public $primaryKey = 'strContractID';
    protected $table = 'tblContract';
}
