@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between my-3">
  <h1 class="h3 mb-0">Editar Grupo</h1>
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

<form method="POST" action="{{ route('groups.update',$role) }}" class="card">
  @csrf @method('PUT')
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-6">
  <label class="form-label">Nome</label>
  <input class="form-control" name="name" value="{{ old('name',$role->name) }}" required>
      </div>
  <!-- Adicione aqui outros campos necessários para edição de grupo, se houver -->
    </div>
  </div>
  <div class="card-footer d-flex gap-2">
    @can('groups.edit')
      <button class="btn btn-primary">
        <i class="bi bi-check2-circle"></i> Salvar
      </button>
    @endcan
    <a class="btn btn-light" href="{{ route('groups.index') }}">Cancelar</a>
  </div>
</form>
@endsection
