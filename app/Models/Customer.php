<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'address', 'phone_number', 'points'];

    /**
     * @return mixed
     */
    public function user() {
      return $this->hasOne('App\Models\User');
    }

    /**
     * @return  mixed
     */
    public function rentals() {
      return $this->hasMany('App\Models\Rental');
    }
}
