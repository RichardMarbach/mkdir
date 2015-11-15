<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class DVD extends Model
{
    protected $table = 'dvds';

    protected $fillable = ['discount', 'age_restriction', 'cover_image', 'price_id', 'dvd_info_id'];

    /**
     * Is the dvd rented?
     * @return boolean
     */
    public function isRented() 
    {
        return $this->rentals()
            ->where('start_date', '>', Carbon::now())
            ->orWhereNull('start_date')
            ->where('due_date', '<', Carbon::now())
            ->orWhereNull('due_date')
            ->orWhere('return_date', '<=', Carbon::now())
            ->count() != 0;
    }

    /**
     * Returns the total stock count for a particular dvd
     * @return mixed
     */
    public function totalStock() {
        return $this->where('dvd_info_id', $this->dvd_info_id)->count();
    }

    /**
     * Returns the number of currently available dvds
     * @return mixed
     */
    public function stock() {
        return $this->leftJoin('rentals', 'dvds.id', '=', 'rentals.dvd_id')
            ->where('dvd_info_id', $this->dvd_info_id)
            ->where('start_date', '>', Carbon::now())
            ->orWhereNull('start_date')
            ->where('due_date', '<', Carbon::now())
            ->orWhereNull('due_date')
            ->orWhere('return_date', '<=', Carbon::now())
            ->count();
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
