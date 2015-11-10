<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVDInfo extends Model
{
  protected $table = 'dvd_info';

  protected $fillable = ['title', 'description', 'length'];

  /**
   * @return mixed
   */
  public function dvds() {
    return $this->hasMany('App\Models\DVD', 'dvd_info_id');
  }

  /**
   * @return mixed
   */
  public function producers() {
    return $this->belongsToMany('App\Models\Producer', 'producer_dvd_info', 'dvd_info_id')->withTimestamps();
  }

  /**
   * @return mixed
   */
  public function genres() {
    return $this->belongsToMany('App\Models\Genre', 'dvd_info_genre', 'dvd_info_id')->withTimestamps();
  }

  /**
   * @return mixed
   */
  public function actors() {
    return $this->belongsToMany('App\Models\Actor', 'actor_roles', 'dvd_info_id')->withPivot('character_name')->withTimestamps();
  }
}
