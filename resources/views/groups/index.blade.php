@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between my-3">
  <h1 class="h3 mb-0">Grupos de Usuários</h1>
  @can('groups.create')
  <a href="{{ route('groups.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Novo Grupo
    </a>
  @endcan
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>Nome</th>
            <th style="width:220px">Ações</th>
          </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
          <tr>
            <td class="align-middle">{{ $role->name }}</td>
            <td class="align-middle">
              <div class="d-flex gap-2">
                @can('groups.edit')
                  <a class="btn btn-sm btn-secondary" href="{{ route('groups.edit',$role) }}">
                    <i class="bi bi-pencil-square"></i> Editar
                  </a>
                @endcan
                @can('groups.delete')
                  <form method="POST" action="{{ route('groups.destroy',$role) }}"
                        onsubmit="return confirm('Confirmar exclusão do grupo?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                      <i class="bi bi-trash3"></i> Excluir
                    </button>
                  </form>
                @endcan
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="2" class="text-center py-4">Nenhum grupo cadastrado</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $roles->links() }}
</div>
@endsection