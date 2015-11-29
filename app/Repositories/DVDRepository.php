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
      return $this->eagerLoadDvdInfo()->find($id);
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
     * Retrieves dvd collection by genre
     * @param  string $genre
     * @return Collection
     */
    public function retrieveByGenre($genre, $pageCount = 20)
    {
        return $this->dvdInfo->whereHas('genres', function($query) use ($genre){
            $query->where('genre', 'like', "%$genre%");
          })
          ->with(
            'producers', 'genres', 'actors', 
            'dvds.price', 'dvds.languages', 'dvds.subtitles',
            'dvds.rentals.customer.user'
          )->paginate($pageCount);
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
            'price', 'rentals.customer.user', 
            'dvd_info.producers', 'dvd_info.actors', 'dvd_info.genres',
            'languages', 'subtitles'
        );
    }

    /** Eagerly load all the dvd_info fields */
    private function eagerLoadDvdInfo() {
        return $this->dvdInfo->with(
        'producers', 'genres', 'actors', 
        'dvds.price', 'dvds.languages', 'dvds.subtitles',
        'dvds.rentals.customer.user'
      );
    }

    /**
     * Add a dvd to the database
     * If you're curious where a million db requests are coming from, it's here.
     * @param  array  $input
     * @return bool
     */
    public function create(array $input){
        $dvd = $this->dvdInfo->firstOrCreate([
            'title'       => $input['title'], 
            'description' => $input['description'], 
            'length'      => $input['length'],
            'cover_image' => $input['cover_image']]);
    
        $price = Price::firstOrCreate([
            'price_whole'    => $input['price_whole'],
            'price_cents'    => $input['price_cents'],
            'late_fee_whole' => $input['late_fee_whole'],
            'late_fee_cents' => $input['late_fee_cents'],
            'points'         => $input['points']
            ]);
        
        $input['price_id'] = $price->id;

        // Insert producers
        for ($i = 0; $i < sizeof($input['producer_name']); $i++) { 
            $producer = Producer::firstOrCreate(['name' => $input['producer_name'][$i]]);
            $dvd->producers()->attach($producer);
        }

        // Insert genres
        for ($i = 0; $i < sizeof($input['genre']); $i++) { 
            $genre = Genre::firstOrCreate(['genre' => $input['genre'][$i]]);
            $dvd->genres()->attach($genre);
        }

        // Insert actors
        for ($i = 0; $i < sizeof($input['actor_name']); $i++) { 
            $actor = Actor::firstOrCreate(['name' => $input['actor_name'][$i]]);
            $dvd->actors()->attach($actor, ['character_name' => $input['character_name'][$i]]);
        }
        
        // Add new dvd stock
        $newDvds = [];
        for ($i = 0; $i < $input['stock']; $i++) { 
            array_push($newDvds, new DVD($input));
        }

        $dvd->dvds()->saveMany($newDvds);

        foreach ($newDvds as $newDvd) {
            // Insert languages
            for ($i = 0; $i < sizeof($input['language_name']); $i++) { 
                $language = Language::firstOrCreate(['language' => $input['language_name'][$i]]);
                $newDvd->languages()->attach($language);
            }

            // Insert subtitles
            for ($i = 0; $i < sizeof($input['subtitle_name']); $i++) { 
                $subtitle = Language::firstOrCreate(['language' => $input['subtitle_name'][$i]]);
                $newDvd->subtitles()->attach($subtitle);
            }
        }
    }

    /**
     * Updates the dvd record in the database
     * @param  array  $input
     * @param App\Models\DVDInfo $dvd
     */
    public function update(DVDInfo $dvd, array $input)
    {
        $dvd->fill($input);
        $dvd->save();

        if (!$dvd->dvds->isEmpty()) {
            $price = Price::firstOrCreate([
                'price_whole'    => $input['price_whole'],
                'price_cents'    => $input['price_cents'],
                'late_fee_whole' => $input['late_fee_whole'],
                'late_fee_cents' => $input['late_fee_cents'],
                'points'         => $input['points']
            ]);

            $dvd->dvds()->update([
                'price_id' => $price->id,
                'age_restriction' => $input['age_restriction'],
            ]);
        }

        $stockChange = $dvd->totalStock() - $input['stock'];

        // Reduce stock
        if ($stockChange > 0) {
            $unrented = $dvd->getUnrented();
            $unrented = $unrented->take($stockChange);

            $ids = array_keys($unrented->getDictionary());
            DVD::destroy($ids);

        } 
        //  Increase stock
        if ($stockChange < 0) {
            $newDvds = [];
            while ($stockChange < 0) {
                array_push($newDvds, new DVD([
                        'price_id' => $price->id,
                        'age_restriction' => $input['age_restriction']
                    ])
                );

                $stockChange += 1;
            }

            $dvd->dvds()->saveMany($newDvds);
        }
    }

}