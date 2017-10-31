<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceInvoiceHeader extends Model
{
    //
    protected $table = 'tblServiceInvoiceHeader';
	protected $primaryKey = 'strServInvHID';
	public $timestamps = false;
}
