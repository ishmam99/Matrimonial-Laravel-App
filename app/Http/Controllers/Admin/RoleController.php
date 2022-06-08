<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->checkPermission('role_permission.access');

        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();
        return view('dashboard.role.createRole', compact('roles', 'permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->checkPermission('role_permission.create');

        Role::create([
            'name' => $request->input('name')
        ])->givePermissionTo($request->input('permissions'));

        return back()->with('success', 'Role Created Successfully.');
    }

    public function edit(Role $role)
    {
        $this->checkPermission('role_permission.edt');

        if($role->id == 1) return back()->with('error', 'Can\'t edit this role.');

        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();
        return view('dashboard.role.createRole', compact('roles', 'permissions', 'role'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        $this->checkPermission('role_permission.edt');

        if($role->id == 1) return back()->with('error', 'Can\'t edit this role.');

        $role->update([
            'name' => $request->input('name')
        ]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $this->checkPermission('role_permission.delete');

        if($role->id == 1) return back()->with('error', 'Can\'t delete this role.');

        $role->delete();
        return back()->with('success', 'Role Deleted successfully.');
    }

    public function roleAssign()
    {
        $this->checkPermission('role_permission.access');

        $roles = Role::whereKeyNot(1)->get();
        $users = User::with('roles')->whereKeyNot(1)->paginate(10);
        return view('dashboard.role.roleassign', compact('roles', 'users'));
    }

    public function storeAssign(Request $request): RedirectResponse
    {
        $this->checkPermission('role_permission.edit');

        User::findOrFail($request->input('user'))
            ->syncRoles($request->input('roles'));

        return redirect()->route('role.assign')->with('success', 'Role assigned to user successfully.');
    }
}
