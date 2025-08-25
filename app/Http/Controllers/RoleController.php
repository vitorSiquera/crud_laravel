<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public  static function middleware(): array
    {
        return [
            'permission:groups.view' => ['index','show'],
            'permission:groups.create' => ['create','store'],
            'permission:groups.edit' => ['edit','update'],
            'permission:groups.delete' => ['destroy'],
        ];

    }

    public function index()
    {
        $roles = Role::query()->orderBy('name')->paginate(10);
        return view('groups.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::query()->orderBy('name')->get();
        return view('groups.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:roles,name'],
            'permissions' => ['array']
        ]);

        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        $role->syncPermissions($data['permissions'] ?? []);

        return redirect()->route('groups.index')->with('ok', 'Grupo criado com sucesso.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::query()->orderBy('name')->get();
        $selected = $role->permissions->pluck('name')->toArray();
        return view('groups.edit', compact('role', 'permissions', 'selected'));
    }

    public function update(Role $role, Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:roles,name,' . $role->id],
            'permissions' => ['array']
        ]);
        $role->update(['name' => $data['name']]);
        $role->syncPermissions($data['permissions'] ?? []);
        return redirect()->route('groups.index')->with('ok', 'Grupo atualizado com sucesso.');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('groups.index')->with('ok', 'Grupo excluído com sucesso.');
    }
}
