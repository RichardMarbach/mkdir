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
      return $this->eagerLoadDvd()->get();
    }

    /**
     * Return all refenced information for a specific dvd
     * @param  Dvd    $dvd 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eagerLoadAll($id) {
      return $this->eagerLoadDvd()->find($id);
    }

    /**
     * Retrieves all dvds collected by dvd info
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function retrieveAllDvds() {
      return $this->eagerLoadDvdInfo()->get();
    }

    /**
     * Retrieves specific dvds by a dvd title
     * @param string $title
     * @param integer $pageCount
     * @return mixed
     */
    public function retrieveDvds($title, $pageCount = 20) {
        return $this->eagerLoadDvdInfo()->where('title', 'LIKE', '%'.$title.'%')->paginate($pageCount);
    }

    /**
     * Retrieves all dvds in pages
     * @param  integer $pageCount
     * @return mixed             
     */
    public function paginateDvds($pageCount = 20) {
        return $this->eagerLoadDvdInfo()->paginate($pageCount);
    }

    /** Eagerly load all the related dvd fields */
    private function eagerLoadDvd() {
        return $this->dvd->with(
            'price', 'rentals.customers.users', 
            'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres',
            'languages', 'subtitles'
        );
    }

    /** Eagerly load all the dvd_info fields */
    private function eagerLoadDvdInfo() {
        return $this->dvdInfo->with(
        'producers', 'genres', 'actors', 
        'dvds.price', 'dvds.languages', 'dvds.subtitles',
        'dvds.rentals.customers.users'
      );
    }
}