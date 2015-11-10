<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'address', 'phone_number', 'points'];

    /**
     * @return mixed
     */
    public function user() {
      return $this->hasOne('App\Models\User');
    }
}
