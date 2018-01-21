<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jan 2018 10:55:11 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoiceidutil
 * 
 * @property string $strInvoiceIDUtil
 *
 * @package App
 */
class Invoiceidutil extends Eloquent
{
	protected $table = 'mydb.invoiceidutils';
	protected $primaryKey = 'strInvoiceIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
