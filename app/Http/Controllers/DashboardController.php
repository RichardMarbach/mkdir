<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\UserRepository;
use App\Repositories\DVDRepository;
use App\Models\Rental;

class DashboardController extends Controller
{
    private $user;
    private $dvds;

    public function __construct(UserRepository $user, DVDRepository $dvds) {
        $this->middleware('auth');

        $this->user = $user;
        $this->dvds = $dvds;
    }

    public function getUserDashboard() 
    {
      return view('user.dashboard')->with('user', $this->user->getUser(Auth::user()));
    }

    public function getAdminDashboard() 
    {
        return view('admin.dashboard');
    }

    public function getAdminCustomers() 
    {
        return view('admin.management-pannels.customers');
    }

    public function getAdminDvds()
    {
        return view('admin.management-pannels.dvds')->with('dvds', $this->dvds->retrieveAllDvds());
    }

    public function getAdminRentals(Rental $rentals)
    {
        return view('admin.management-pannels.rentals')
            ->with('rentals', $rentals->getRented())
            ->with('dvds', $this->dvds->retrieveAllDvds());
    }

}
