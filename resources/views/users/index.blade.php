<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body>

    <a href="{{ route('user.create') }}">Criar Usuario</a><br>

    <h2>Listar Usuarios</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif
    
    @forelse ($users as $user)
       ID: {{ $user->id }}<br>
       Nome: {{ $user->name }}<br>
       Email: {{ $user->email }}<br>
       <a href="{{ route('user.show', ['user' => $user->id]) }}">visualizar</a>
       <a href="{{ route('user.edit', ['user' => $user->id]) }}">editar</a>

       <hr>

    @empty
       <p>Nenhum usuário encontrado.</p>
    @endforelse
</body>
</html>