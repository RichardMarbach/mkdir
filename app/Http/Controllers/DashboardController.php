<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getAdminDashboard() {
        return view('admin.dashboard');
    }

    public function getUserDashboard() {
        return 'User dashboard';
    }

}
