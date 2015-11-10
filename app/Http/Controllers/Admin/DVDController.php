<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DVDController extends Controller
{
    public function index(\App\Repositories\DVDRepository $dvds) {
      return $dvds->eagerLoadAll();
    }

    public function createDVD()
    {
        return view('DVD/createDVD');
    }
}