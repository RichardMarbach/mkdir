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
     * Returns all referenced information of a dvd
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eagerLoadAll() {
      return $this->dvd->with('price', 'rentals.customers.users', 'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres')
          ->get();
    }
}