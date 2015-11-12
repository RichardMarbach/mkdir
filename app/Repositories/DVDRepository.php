<?php

namespace App\Repositories;

use App\Models\DVD;
use App\Models\DVDInfo;

class DVDRepository 
{
    private $dvd;

    private $dvdInfo;

    public function __construct(DVD $dvd, DVDInfo $dvdInfo) {
      $this->dvd = $dvd;
      $this->dvdInfo = $dvdInfo;
    }

    /**
     * Returns all referenced information for all dvds
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eagerLoadAllDvds() {
      return $this->dvd->with('price', 'rentals.customers.users', 'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres')
          ->get();
    }

    /**
     * Return all refenced information for a specific dvd
     * @param  Dvd    $dvd 
     * @return \Illumate\Database\Eloquent\Collection
     */
    public function eagerLoadAll(Dvd $dvd) {
      return $dvd->with('price', 'rentals.customers.users', 'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres')
          ->get();
    }
}