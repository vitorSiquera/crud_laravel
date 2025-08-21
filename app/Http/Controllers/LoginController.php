<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
       $request->validated();

       $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if(!$authenticated) {
            return redirect()->back()->withErrors(['email' => 'Email ou Senha incorretos'])->withInput();
        }        
        
        $user = Auth::user();
        $user = User::find($user->id);

        return redirect()->route('user.index')->with('success', 'Login successful!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Perfil deslogado');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(LoginRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),                   
        ]);

        DB::commit();

        return redirect()->route('login')->with('success', 'Usuário criado com sucesso!');

    } catch (Exception $e) {
        DB::rollBack();
        return back()->withInput()->withErrors(['error' => 'Erro ao criar usuário: ' . $e->getMessage()]);
        }
    }
}