<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Permission;
use Illuminate\Http\Request;
use function Termwind\render;
use App\Http\Resources\RolePermissionResource;

use App\Http\Requests\Admin\Permission\StorePermissionRequest;
use App\Http\Requests\Admin\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Permission/Index', [
            'permissions' => RolePermissionResource::collection(Permission::withoutTrashed()->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Permission/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return Inertia::render('Admin/Permission/Edit', [
            'permission' => new RolePermissionResource($permission)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json();
    }
}
