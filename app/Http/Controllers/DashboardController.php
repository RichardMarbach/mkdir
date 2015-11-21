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

    public function getAdminDashboard() {
        return view('admin.dashboard')->with('user', $this->user->getUser(Auth::user()));
    }

    public function getUserDashboard() {
      return view('user.dashboard')->with('user', $this->user->getUser(Auth::user()));
    }

}
