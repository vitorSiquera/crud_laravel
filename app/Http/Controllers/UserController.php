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
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
       $request->validated();
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->pluck('name','name');
        return view('users.edit', compact('user','roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => ['nullable', 'string', 'exists:roles,name']
        ]);

        $user->fill($data)->save();

        if (isset($data['role'])) {
            $user->assignRoles($data['role']);
        } 
        // return back()->route('user.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso!');
        
        return back()->with('ok','Usuário atualizado.');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
