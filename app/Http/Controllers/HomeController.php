<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DVDRepository;

class HomeController extends Controller
{
    private $dvds;

    public function __construct(DVDRepository $dvds)
    {
        $this->dvds = $dvds;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with('dvds', $this->dvds);
    }
}
