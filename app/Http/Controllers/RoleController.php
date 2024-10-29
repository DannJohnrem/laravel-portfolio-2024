<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Inertia\Inertia;
use App\Models\Permission;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    // Inject the RoleService into the controller
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Admin/Role/Index', [
            'roles' => Role::withoutTrashed()->with('permissions')->latest()->paginate($request->input('per_page', 6))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Role/Create', [
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleService->createRoleWithPermissions($request->validated());

        // $role = Role::create($request->validated());
        // if ($request->has('permissions')) {
        //     $role->syncPermissions($request->input('permissions.*.name'));
        // }

        return to_route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role->load('permissions');
        return Inertia::render('Admin/Role/Edit', [
            'role' => new RoleResource($role),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // $role->update($request->validated());

        // $role->update([
        //     'name' => $request->name,
        // ]);

        $this->roleService->updateRoleWithPermissions($role, $request->validated());

        // $role->syncPermissions($request->input('permissions.*.name'));

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(['message' => 'User deleted successfully.'], 200);
    }
}
