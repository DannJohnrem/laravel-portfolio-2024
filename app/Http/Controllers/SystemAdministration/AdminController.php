<?php

namespace App\Http\Controllers\SystemAdministration;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class AdminController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('system-administration/Index', [
            'users' => UserResource::collection(User::all())
        ]);
    }
}
