<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DVDController extends Controller
{
    public function createDVD()
    {
        return view('DVD/createDVD');
    }
}