<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteIDUtil extends Model
{
    protected $fillable = [
      'strQuoteIDUtil'
    ];
    public $timestamps = false;
    protected $primaryKey = 'strQuoteIDUtil';
    protected $table = 'tblQuoteIDUtil';
}
