<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <a href="{{ route('user.index') }}">Listar</a><br>
    <a href="{{ route('user.show', ['user' => $user->id]) }}">visualizar</a><br>
    <h2>editar Usuario</h2>

    @if ($errors->any())
        <p style="color: red">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        </p>
    @endif

    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"  value="{{ old('name', $user->name) }}" placeholder="Digite seu nome">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Digite seu email" required>
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="password" placeholder="Digite sua senha" required>
        <br>
        <br>
        <button type="submit">Atualizar</button>
    </form>

</body>
</html>