<?php

namespace App\Repositories;

use DB;
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

    /**
     * Add a dvd to the database
     * @param  array  $input
     * @return bool
     */
    public function create(array $input){
        DB::beginTransaction();
        try {
            $dvd = $this->dvdInfo->firstOrCreate([
                'title'       => $input['title'], 
                'description' => $input['description'], 
                'length'      => $input['length']]);
        
            $price = Price::firstOrCreate([
                'price_whole'    => $input['price_whole'],
                'price_cents'    => $input['price_cents'],
                'late_fee_whole' => $input['late_fee_whole'],
                'late_fee_cents' => $input['late_fee_cents'],
                'points'         => $input['points']
                ]);
            
            $input['price_id'] = $price->id;

            // TODO: Handle multiple
            $producer = Producer::firstOrCreate(['name' => $input['producer_name']]);
            $genre = Genre::firstOrCreate(['genre' => $input['genre']]);
            $actor = Actor::firstOrCreate(['name' => $input['actor_name']]);
            $language = Language::firstOrCreate(['language' => $input['language_name']]);
            $subtitle = Language::firstOrCreate(['language' => $input['language_name']]);

            // Attach relations
            $dvd->producers()->attach($producer);
            $dvd->genres()->attach($genre);
            $dvd->actors()->attach($actor, ['character_name' => $input['character_name']]);

            // Add new dvd stock
            $newDvds = [];
            for ($i = 0; $i < $input['stock']; $i++) { 
                array_push($newDvds, new DVD($input));
            }

            $dvd->dvds()->saveMany($newDvds);

            foreach ($newDvds as $newDvd) {
                $newDvd->languages()->save($language);
                $newDvd->subtitles()->save($subtitle);
            }

            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }
    }

}