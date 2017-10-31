<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentForm extends Model
{
    //
    protected $table = 'tblPaymentForm';
	protected $primaryKey = 'intFormID';
	public $timestamps = false;
}
