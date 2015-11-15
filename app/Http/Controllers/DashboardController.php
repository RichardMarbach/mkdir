<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getAdminDashboard() {
        return view('admin.dashboard')->with('user', Auth::user());
    }

    public function getUserDashboard() {
        return 'User dashboard';
    }

}
