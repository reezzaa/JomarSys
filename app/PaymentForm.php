<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentForm extends Model
{
    //
     protected $fillable = [
      'FormDesc',
      'status',
      'todelete',
    ];
    public $timestamps = false;
    protected $table = 'tblpaymentform';
}
