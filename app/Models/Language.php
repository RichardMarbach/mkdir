<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['language'];

    /**
     * @return mixed
     */
    public function dvdsInLanguage() {
      return $this->belongsToMany('App\Models\DVD', 'dvd_languages', 'language_id', 'dvd_id')
          ->withTimestamps();
    }

    /**
     * @return  mixed
     */
    public function dvdsWithSubtitles() {
      return $this->belongsToMany('App\Models\DVD', 'dvd_subtitles', 'language_id', 'dvd_id')
          ->withTimestamps();
    }
}
