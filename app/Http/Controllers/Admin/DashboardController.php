<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    function index()
    {
        $totalUsers = User::count();

        return Inertia::render('Dashboard',[
            'totalUsers' => $totalUsers
        ]);
    }
}
