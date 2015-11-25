<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DVDInfo extends Model
{
    protected $table = 'dvd_info';

    protected $fillable = ['title', 'description', 'length', 'cover_image'];

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
        return $this->belongsToMany('App\Models\Producer', 'producer_dvd_info', 'dvd_info_id')
            ->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function genres() {
        return $this->belongsToMany('App\Models\Genre', 'dvd_info_genre', 'dvd_info_id')
            ->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function actors() {
        return $this->belongsToMany('App\Models\Actor', 'actor_roles', 'dvd_info_id', 'actor_id')
            ->withPivot('character_name')->withTimestamps();
    }

    /**
     * Amount of dvds currently in stock
     * @return int
     */
    public function stock()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->stock();
    }

    /**
     * Total amount of dvds
     * @return int
     */
    public function totalStock()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->totalStock();
    }

    /**
     * Retrieve the cover images url path
     * @return string 
     */
    public function getCoverImage()
    {
        return !empty($this->cover_image) ? '/images/' . $this->cover_image : 'https://placeholdit.imgix.net/~text?txtsize=14&txt=150%C3%97300&w=150&h=200';
    }
}
