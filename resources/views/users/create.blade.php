<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body>

    <a href="{{ route('user.index') }}">Voltar</a>
    <h2>Criar Usuario</h2>

    @if ($errors->any())
        <p style="color: red">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        </p>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name"  value="{{ old('name') }}" placeholder="Digite seu nome">
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required>
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="password" placeholder="Digite sua senha" required>
        <br>
        <br>
        <button type="submit">Criar</button>
    </form>

</body>
</html>
