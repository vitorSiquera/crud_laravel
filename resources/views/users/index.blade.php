@extends('layouts.admin')

@section('content')  

<div class="card mb-4 border-light shadow mt-5">

        <div class="card-header hstack gap-2 ">
            <span>
                <h2>Listar Usuarios</h2>
            </span>
            <span class="ms-auto">
                @can('user.create')
                <a href="{{ route('user.create') }}" class="btn btn-success">Cadastrar</a>
                @endcan
            </span>
        </div> 
        
    <div class="card-body">

        <x-alert />

        <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        

            @forelse ($users as $user)
                

            <tr>
                <th scope="row"> {{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary">visualizar</a>
                    @can('user.edit')
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-secondary">editar</a>
                    @endcan
                    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" style="display:inline;">
                        @csrf
                        @method('delete')
                        @can('user.delete')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')" class="btn btn-danger">Deletar</button>
                        @endcan
                    </form>

                </td>
                </tr>         

        @empty
        <p>Nenhum usuário encontrado.</p>
        @endforelse
        </tbody>
    </table>

    </div>
</div>
@endsection