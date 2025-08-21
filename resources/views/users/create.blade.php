@extends('layouts.admin')

@section('content')  

<div class="card mb-4 border-light shadow mt-5">
    <div class="card-header hstack gap-2">
        <h2 class="mb-0">Criar Usuário</h2>
        <div class="ms-auto">
            <a href="{{ route('user.index') }}" class="btn btn-info btn-sm">Listar</a>
        </div>
    </div>

    <div class="card-body">
        <x-alert />

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-12 col-md-6">
                <label for="name" class="form-label">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Digite o nome"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Digite o e-mail"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

                <div class="col-12 col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Defina a senha"
                            class="form-control @error('password') is-invalid @enderror">
                        <span class="input-group-text" role="button" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye-fill"></i>
                        </span>
                    </div>                
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Repita a senha"
                            class="form-control">                    
                        <span class="input-group-text" role="button"
                            onclick="togglePassword('password_confirmation', this)">
                            <i class="bi bi-eye-fill"></i>
                        </span>
                    </div>
                </div>
                
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
    </div>
</div>
@endsection
