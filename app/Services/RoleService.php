<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function createRoleWithPermissions(array $data): Role
    {
        // Create the role
        $role = Role::create($data);

        // Check if permissions are provided and sync them
        if (isset($data['permissions'])) {
            // Extract permission names from the data
            $permissions = array_column($data['permissions'], 'name');
            $role->syncPermissions($permissions);
        }

        return $role;
    }

    public function updateRoleWithPermissions(Role $role, array $data): void
    {
        // Update the role
        $role->update($data);

        // Check if permissions are provided and sync them
        if (isset($data['permissions'])) {
            // Extract permission names from the data
            $permissions = array_column($data['permissions'], 'name');
            $role->syncPermissions($permissions);
        }
    }
}
