@extends('layouts.admin')

@section('content')  

<div class="card mb-4 border-light shadow mt-5">
    <div class="card-header hstack gap-2 ">
        <span>
            <h2>Visualizar Usuário</h2>
        </span>
        <span class="ms-auto ">
            <a href="{{ route('user.index') }}" class="btn btn-info btn-sm">Listar</a>
            @can('user.edit')
            <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            @endcan
            <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                @csrf
                @method('delete')
                @can('user.delete')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Deletar</button>
                @endcan
            </form>
        </span>
    </div>
    <div class="card-body">
        <x-alert />
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
            <li class="list-group-item"><strong>Nome:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Cadastrado:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</li>
            <li class="list-group-item"><strong>Editado:</strong> {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}</li>
        </ul>
    </div>
</div>
@endsection
