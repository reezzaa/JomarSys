<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
     protected $fillable = [
     'intQDID',
      'strQHID',
      'intSOID',
      'dcmQuoteServiceCost',
      'strQuoteDesc'
    ];
    public $timestamps = false;
    // public $incrementing = false;
    protected $primaryKey = 'intQDID';
    protected $table = 'tblQuoteDetail';
}
