@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between my-3">
  <h1 class="h3 mb-0">Novo Grupo</h1>
  <a class="btn btn-outline-secondary" href="{{ route('groups.index') }}">
    <i class="bi bi-arrow-left"></i> Voltar
  </a>
</div>

@if($errors->any())
  <div class="alert alert-danger">
    <strong>Erros de validação</strong>
    <ul class="mb-0">
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('groups.store') }}" class="card">
  @csrf
  <div class="card-body">
    <div class="mb-3">
      <label class="form-label">Nome do grupo</label>
      <input name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <h5 class="mt-4">Permissões</h5>
    @include('groups._permissions', ['permissions' => $permissions, 'selected' => old('permissions', [])])
  </div>
  <div class="card-footer d-flex gap-2">
    <button class="btn btn-primary">
      <i class="bi bi-check2-circle"></i> Salvar
    </button>
    <a class="btn btn-light" href="{{ route('groups.index') }}">Cancelar</a>
  </div>
</form>
@endsection
