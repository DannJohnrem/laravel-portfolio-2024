<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\RolePermissionResource;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Role/Index', [
            'roles' => RolePermissionResource::collection(Role::withoutTrashed()->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Role/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());

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
        return Inertia::render('Admin/Role/Edit', [
            'role' => new RolePermissionResource($role)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json();
    }
}
