<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyClient extends Model
{
    protected $fillable = [
      'strCompClientID',
      'strCompClientImage',
      'strCompClientName',
      'strCompClientRepresentative',
      'strCompClientPosition',
      'strCompClientTIN',
      'strCompClientContactNo',
      'strCompClientEmail',
      'strCompClientAddress',
      'strCompClientCity',
      'strCompClientProv'
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'strCompClientID';
    protected $table = 'tblCompanyClient';
}
