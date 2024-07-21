<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    // Display all roles and permissions
    public function roles()
    {
        $roles = Role::with('permissions')->get(); // Fetch all roles with their associated permissions
        $permissions = Permission::all(); // Fetch all permissions
        return view('admin.roles', compact('roles', 'permissions'));
    }

        // Create a new role
        public function createRole(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            Role::create($request->only('name'));
    
            return redirect()->route('admin.roles')->with('success', 'Role created successfully.');
        }

            // Display all permissions
    public function permissions()
    {
        $permissions = Permission::all();
        return view('admin.permissions', compact('permissions'));
    }

    // Assign permissions to a role
    public function assignPermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = $request->input('permissions', []);

        // Ensure permissions exist and are named correctly
        $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
        
        if (empty($permissionNames)) {
            return redirect()->back()->withErrors("No valid permissions found.");
        }
        
        $role->syncPermissions($permissionNames); // Sync permissions by names

        return redirect()->route('admin.roles')->with('success', 'Permissions assigned successfully.');
    }

    // Create a new permission
    public function createPermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('admin.permissions')->with('success', 'Permission created successfully.');
    }
}
