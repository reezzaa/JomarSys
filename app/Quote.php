<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Quote extends Model
{
    protected $fillable = [
      'strQuoteID',
      'intClientID',
      'strQuoteName',
      'datQuoteDate',
      'status'
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'strQuoteID';
    protected $table = 'tblQuoteHeader';
}
