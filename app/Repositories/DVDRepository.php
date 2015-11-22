<?php

namespace App\Repositories;

use App\Models\Actor;
use App\Models\DVD;
use App\Models\DVDInfo;
use App\Models\Genre;
use App\Http\Controllers\Admin\DVDController;
use App\Models\Language;
use App\Models\Price;
use App\Models\Producer;


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
      return $this->dvd->with(
        'price', 'rentals.customers.users', 
        'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres', 
        'languages', 'subtitles'
      )->get();
    }

    /**
     * Return all refenced information for a specific dvd
     * @param  Dvd    $dvd 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function eagerLoadAll(Dvd $dvd) {
      return $dvd->with(
        'price', 'rentals.customers.users', 
        'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres',
        'languages', 'subtitles'
      )->get();
    }

    /**
     * Retrieves all dvds collected by dvd info
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function retrieveAllDvds() {
      return $this->eagerLoadDvdInfo()->get();
    }

    /**
     * Retrieves all dvds in pages
     * @param  integer $pageCount
     * @return mixed             
     */
    public function paginateDvds($pageCount = 20) {
        return $this->eagerLoadDvdInfo()->paginate($pageCount);
    }

    private function eagerLoadDvdInfo() {
        return $this->dvdInfo->with(
        'producers', 'genres', 'actors', 
        'dvds.price', 'dvds.languages', 'dvds.subtitles',
        'dvds.rentals.customers.users'
      );
    }

    public static function create($input){
            $DVD = DVDInfo::firstOrCreate(['title'=>$input->title]);
            $price = Price::firstOrCreate(['price'=>$input->price]);
            $producer = Producer::firstOrCreate(['name'=>$input->producer_name]);
            $DVD->producers()->attach($producer);
            $genre = Genre::firstOrCreate(['genre'=>$input->genre]);
            $DVD->genres()->attach($genre);
            $actor = Actor::firstOrCreate(['name'=>$input->actor_name]);
            $DVD->actors()->attach($actor,['character_name'=>$input->character_name]);
            $inputArray = $input->all();
            $inputArray['price_id'] = $price->id;
            $DVD->dvds()->save(new DVD($inputArray));
            $DVD = dvdInfo::find($DVD->id);
            $language = Language::firstOrCreate(['language'=>$input->language_name]);
            $DVD->dvds()->first()->languages()->save($language);
            $subtitle = Language::firstOrCreate(['language'=>$input->subtitle_name]);
            $DVD->dvds()->first()->languages()->save($subtitle);
    }

}