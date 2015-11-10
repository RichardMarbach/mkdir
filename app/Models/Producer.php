<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = ['name'];

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->belongsToMany('App\Models\DVDInfo', 'producer_dvd_info'
          , 'producer_id', 'dvd_info_id')->withTimestamps();
    }

}
