<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::paginate(10)
        ]);
    }

    public function getUsers(Request $request)
    {
        $perPage = $request->input('length', 10); // Default to 10 if not provided
        $page = ($request->input('start', 0) / $perPage) + 1; // Calculate the current page

        // Initialize the query
        $query = User::query();

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchTerm = $request->search['value'];
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        // Get total count of records before filtering
        $totalRecords = User::count();

        // Fetch paginated users based on request parameters
        $users = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'draw' => intval($request->input('draw')), // Required for DataTables to work
            'recordsTotal' => $totalRecords, // Total records before filtering
            'recordsFiltered' => $users->total(), // Total records after filtering
            'data' => $users->items(), // The actual data array
        ]);
    }
}
