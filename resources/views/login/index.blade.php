@extends('layouts.auth');


@section('content')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        
        <img class="mb-4" src="{{ asset('images/coruja-removebg-preview.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <x-alert />

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="email">Email address</label>
            </div>
            
                <div class="input-group mb-3">
                    <div class="form-floating flex-grow-1">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button type="button" class="input-group-text" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>

            <button class="btn btn-primary w-100 py-2  mb-4" type="submit">Sign in</button>
            
            <a href="" class="text-decoration-none">Cadastrar</a>
            
        </form>
    </main>


@endsection