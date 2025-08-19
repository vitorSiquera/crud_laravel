<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

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

    
}
