<?php

namespace App\Http\Controllers\SystemAdministration;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('system-administration/Index');
    }
}
