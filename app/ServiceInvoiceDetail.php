<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceInvoiceDetail extends Model
{
    //
    protected $table = 'tblServiceInvoiceDetail';
	protected $primaryKey = 'intServInvDServInvHID';
	public $timestamps = false;
}
