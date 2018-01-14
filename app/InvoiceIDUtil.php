<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
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
	protected $primaryKey = 'strInvoiceIDUtil';
	public $incrementing = false;
	public $timestamps = false;
}
