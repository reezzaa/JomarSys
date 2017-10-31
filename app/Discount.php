<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
      'strDiscountName',
      'dblDiscountPercent',
      'todelete',
      'status',
    ];
    public $timestamps = false;
    protected $primaryKey = 'intDiscountID';
    protected $table = 'tblDiscount';
}
