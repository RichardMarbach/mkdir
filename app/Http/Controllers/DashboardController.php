<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getAdminDashboard() {
        return view('admin.dashboard')->with('user', Auth::user()->with('customer')->first());
    }

    public function getUserDashboard() {
      return view('user.dashboard');
    }

}
