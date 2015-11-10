<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['name'];

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->belongsToMany('App\Models\DVDInfo', 'actor_roles'
        , 'actor_id', 'dvd_info_id')->pivot('character_name')->withTimestamps();
    }
}
