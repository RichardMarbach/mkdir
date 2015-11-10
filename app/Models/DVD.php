<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $table = 'dvds';

    protected $fillable = ['discount', 'age_restriction', 'cover_image'];

    /**
     * @return mixed
     */
    public function dvd_info() {
      return $this->belongsTo('App\Models\DVDInfo', 'dvd_info_id');
    }

    /**
     * @return mixed
     */
    public function price() {
      return $this->belongsTo('App\Models\Price');
    }

    /**
     * @return mixed
     */
    public function rentals() {
      return $this->hasMany('App\Models\Rental');
    }

    /**
     * @return mixed
     */
    public function languages() {
      return $this->belongsToMany('App\Models\Language', 'dvd_language')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function subtitles() {
      return $this->belongsToMany('App\Models\Language', 'dvd_subtitle')->withTimestamps();
    }
}
