<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    private $user;

    public function __construct(UserRepository $user) {
        $this->middleware('auth');

        $this->user = $user;
    }

    public function getUserDashboard() 
    {
      return view('user.dashboard')->with('user', $this->user->getUser(Auth::user()));
    }

    public function getAdminDashboard() 
    {
        return view('admin.dashboard')->with('users', $this->user->getAllUsers());
    }

    public function getAdminCustomers() 
    {
        return view('admin.management-pannels.customers');
    }

    public function getAdminDvds()
    {
        return view('admin.management-pannels.dvds');
    }

    public function getAdminRentals()
    {
        return view('admin.management-pannels.rentals');
    }

}
