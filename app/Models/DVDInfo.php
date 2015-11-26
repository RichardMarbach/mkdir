<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DVDInfo extends Model
{
    use SoftDeletes;
    
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

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->dvds->isEmpty() ? '0,-' : $this->dvds()->first()->price->format();
    }

    /**
     * Get late
     * @return string
     */
    public function getLateFee()
    {
        return $this->dvds->isEmpty() ? '0,-' : $this->dvds()->first()->price->formatLate();   
    }

    /**
     * whole price of dvd
     * @return int
     */
    public function wholePrice()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->price->price_whole;
    }

    /**
     * Cent price of dvd
     * @return int
     */
    public function centPrice()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->price->price_cents;
    }

    /**
     * whole price of dvd
     * @return int
     */
    public function feeWhole()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->price->late_fee_whole;
    }

    /**
     * Cent price of dvd
     * @return int
     */
    public function feeCents()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->price->late_fee_cents;
    }

    /**
     * Get discount of dvd
     * @return int
     */
    public function getDiscount()
    {
        return $this->dvds->isEmpty() ? 0 : $this->dvds()->first()->discount;
    }
}
