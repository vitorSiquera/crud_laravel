@extends('layouts.auth')

@section('content')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">        
        <img class="mb-4" src="{{ asset('images/coruja-removebg-preview.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Novo Usuario</h1>
        <x-alert />

        <form action="{{ route('login.store-user') }}" class="" method="POST">
            @csrf
            @method('POST')

            <div class="form-floating mb-4">
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nome" class="form-control @error('name') is-invalid @enderror">
                <label for="name">Nome</label>
                @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>


            <div class="form-floating mb-4">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <label for="email">Email</label>
            </div>

            <div class="input-group mb-3">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Senha">
                    <label for="password">Senha</label>
                </div>
                <button type="button" class="input-group-text" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" onclick="togglePassword('password', this)">
                    <i class="bi bi-eye-fill"></i>
                </button>
            </div>
            @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror

            <div class="input-group mb-3">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar Senha">
                    <label for="password_confirmation">Confirmar Senha</label>
                </div>
                <button type="button" class="input-group-text" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" onclick="togglePassword('password_confirmation', this)">
                    <i class="bi bi-eye-fill"></i>
                </button>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Criar Usuario</button>

            <a href="{{ route('login') }}" class="text-decoration-none mt-3 d-inline-block">Login</a>
        </form>
    </main>
@endsection