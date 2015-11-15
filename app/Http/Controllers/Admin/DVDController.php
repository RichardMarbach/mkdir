<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DVD;
use App\Models\DVDInfo;
use Request;

class DVDController extends Controller
{
    public function index(\App\Repositories\DVDRepository $dvds) {
      return $dvds->eagerLoadAll();
    }

    public function createDVD()
    {
        return view('DVD/createDVD');
    }



    public function store()
    {

        $input = Request::all();
        DVD::create($input);

    }

}