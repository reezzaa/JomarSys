<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualClient extends Model
{
    protected $fillable = [
      'strIndClientID',
      'strIndClientFName',
      'strIndClientMName',
      'strIndClientLName',
      'strIndClientContactNo',
      'strIndClientAddress',
      'strIndClientCity',
      'strIndClientProv',
      'strIndClientTIN'
    ];
    public $timestamps = false;
    protected $primaryKey = 'strIndClientID';
    protected $table = 'tblIndividualClient';

}
