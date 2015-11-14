<?php

namespace App\Composers;

use Illuminate\Contracts\View\View;
use App\Repositories\DVDRepository as DVDRepository;

class DVDComposer 
{
    protected $dvds;

    public function __construct(DVDRepository $dvds) 
    {
        $this->dvds = $dvds;
    }

    public function compose(View $view)
    {
        $view->with('dvds', $this->dvds->eagerLoadAllDvds());
    }
}