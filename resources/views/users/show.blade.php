<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('user.index') }}">Listar Usuario</a><br>
    <a href="{{ route('user.edit', ['user' => $user->id]) }}">editar</a>

     @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <h2>visualizar Usuario</h2>

    iD: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    Email: {{ $user->email }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}<br>
    Editado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}

</body>
</html>
