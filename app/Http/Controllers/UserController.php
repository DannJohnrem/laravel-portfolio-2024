<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided

        // Retrieve paginated users
        $users = User::paginate($perPage);

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }
}
