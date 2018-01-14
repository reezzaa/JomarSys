<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 14 Jan 2018 14:45:44 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Companyutil
 * 
 * @property int $intCompanyUtilID
 * @property string $strCompanyName
 * @property string $strCompanyTIN
 * @property string $strCompanyAddress
 * @property string $strCompanyEmail
 * @property string $strGeneralManagerName
 * @property string $strCompanyLogo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Companyutil extends Eloquent
{
	protected $primaryKey = 'intCompanyUtilID';

	protected $fillable = [
		'strCompanyName',
		'strCompanyTIN',
		'strCompanyAddress',
		'strCompanyEmail',
		'strGeneralManagerName',
		'strCompanyLogo'
	];
}
