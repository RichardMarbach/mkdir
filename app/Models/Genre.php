<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['genre'];

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->belongsToMany('App\Models\DVDInfo', 'dvd_info_genre'
        , 'genre_id', 'dvd_info_id')->withTimestamps();
    }
}
