<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
       $request->validated();
          
    }
}
