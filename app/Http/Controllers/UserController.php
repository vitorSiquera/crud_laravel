<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderByDesc('id')->get();

        return view('users.index', [ 'users' => $users ]);
    }

    public function show(User $user)
    {
        
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        $roles = Role::orderBy('name')->pluck('name','name');
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }

        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->pluck('name','name');
        $currentRole = $user->getRoleNames()->first();
        return view('users.edit', compact('user','roles', 'currentRole'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,' . $user->id],
            'role' => ['nullable', 'string', 'exists:roles,name']
        ]);

        $user->fill([
            'name' => $data['name'],
            'email' => $data['email'],
        ])->save();

        if (array_key_exists('role', $data)) {
            $user->syncRoles([$data['role'] ? $data['role'] : []]);
        }

        return back()->with('ok','Usuário atualizado.');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
