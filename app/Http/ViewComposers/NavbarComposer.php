<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Genre;

class NavbarComposer 
{
    protected $genre;

    public function __construct(Genre $genre) 
    {
        $this->genre = $genre;
    }

    public function compose(View $view)
    {
        $view->with('genres', $this->genre->all());
    }
}