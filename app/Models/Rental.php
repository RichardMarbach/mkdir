<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes;

    protected $fillable = ['start_date', 'due_date', 'return_date', 'customer_id', 'dvd_id'];

    protected $dates = ['created_at', 'updated_at', 'start_date', 'due_date', 'return_date', 'deleted_at'];

    /**
     * Is the dvd returned?
     * @return boolean
     */
    public function isReturned() {
      return $this->return_date !== null;
    }

    /**
     * Is the dvd return late?
     * @return boolean
     */
    public function isLate() {
      return !$this->isReturned() && $this->due_date < Carbon::now();
    }

    /**
     * Is the dvd currently rented?
     * @return boolean
     */
    public function isRented() {
      return $this->start_date <= Carbon::now() 
        && $this->due_date >= Carbon::now() 
        && !$this->isReturned();
    }

    /**
     * Get all rented dvds
     * @return Collection
     */
    public function getRented() {
        return $this->whereNotNull('start_date')
            ->whereNull('return_date')
            ->with('dvds.dvd_info')->get();
    }

    /**
     * @return mixed
     */
    public function customers() {
      return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->belongsTo('App\Models\DVD');
    }
}
