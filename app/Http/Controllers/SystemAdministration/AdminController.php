<?php

namespace App\Http\Controllers\SystemAdministration;

use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class AdminController extends Controller
{
    public function index(Request $request): Response
    {
        $users = User::with(['roles', 'permissions'])
            ->withoutTrashed()
            ->latest()
            ->paginate($request->input('per_page', 6));

        return Inertia::render('Admin/system-administration/Index', [
            'users' => UserResource::collection($users),
            'pagination' => $users->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/system-administration/Create', [
            'roles' => RoleResource::collection(Role::all()),
            'permissions' => PermissionResource::collection(Permission::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->input('roles.*.name'));
        $user->syncPermissions($request->input('permissions.*.name'));

        return to_route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('permissions', 'roles');
        return Inertia::render('Admin/system-administration/Edit', [
            'user' => new UserResource($user),
            'roles' => RoleResource::collection(Role::all()),
            'permissions' => PermissionResource::collection(Permission::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();

        // Only update the password if it's provided
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        $user->syncRoles($validatedData['roles']);
        $user->syncPermissions($validatedData['permissions']);

        return to_route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json();
    }
}
