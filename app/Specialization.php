<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
      protected $fillable = [
      'strSpecDesc',
      'todelete',
      'status',
    ];
    public $timestamps =false;
    protected $primaryKey = 'intSpecID';
    protected $table = 'tblSpecialization';

    public function categories()
    {
        return $this->belongsToMany('App\Employee');
    }
}
