<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $table = 'dvds';

    protected $fillable = ['discount', 'age_restriction', 'cover_image', 'price_id', 'dvd_info_id'];

    public function stock() {
        return $this->where('dvd_info_id', $this->dvd_info_id)->count();
    }

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
      return $this->hasMany('App\Models\Rental', 'dvd_id');
    }

    /**
     * @return mixed
     */
    public function languages() {
      return $this->belongsToMany('App\Models\Language', 'dvd_languages', 'dvd_id')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function subtitles() {
      return $this->belongsToMany('App\Models\Language', 'dvd_subtitles', 'dvd_id')->withTimestamps();
    }
}
