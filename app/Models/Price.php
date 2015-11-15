<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price_whole', 'price_cents', 'late_fee', 'points'];

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->hasMany('App\Models\DVD');
    }
}
