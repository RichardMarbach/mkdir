<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price_whole', 'price_cents', 'late_fee_whole', 'late_fee_cents', 'points'];

    /**
     * @return mixed
     */
    public function dvds() {
      return $this->hasMany('App\Models\DVD');
    }

    /**
     * @return  string
     */
    public function format()
    {
        $string = $this->price_whole . '.';

        if ($this->price_cents === 0) {
            return $string . '-';
        }

        if ($this->price_cents < 10) {
            return $string . '0' . $this->price_cents;
        }

        return $string . $this->price_cents;
    }

    /**
     * Format late fee
     * @return string
     */
    public function formatLate()
    {
        $string = $this->late_fee_whole . '.';

        if ($this->late_fee_cents === 0) {
            return $string . '-';
        }

        if ($this->late_fee_cents < 10) {
            return $string . '0' . $this->late_fee_cents;
        }

        return $string . $this->late_fee_cents;
    }
}
