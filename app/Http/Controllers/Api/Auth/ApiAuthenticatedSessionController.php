<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class ApiAuthenticatedSessionController extends Controller
{
    use ApiResponses;

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $token = Auth::user()->createToken('Personal Access Token')->plainTextToken;

        return $this->ok(Auth::user(), 'User retrieved successfully', $token);
    }
}
