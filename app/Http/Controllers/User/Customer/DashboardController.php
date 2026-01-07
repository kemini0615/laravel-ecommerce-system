<?php

namespace App\Http\Controllers\User\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.customer.dashboard.index');
    }
}
