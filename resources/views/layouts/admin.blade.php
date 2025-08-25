<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

 <header class="p-3 text-bg-primary">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <!-- Logo -->
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
            </svg>
        </a>

        <!-- Menu de Navegação -->
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Home</a></li>
            <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Usuarios</a></li>
            <li><a href="{{ route('groups.index') }}" class="nav-link px-2 text-white">Grupos de Usuarios</a></li>              
            
        </ul>

        <div class="text-end">
            <a href="{{ route('login.destroy') }}" type="button" class="btn btn-outline-light me-2">Sair</a>
        </div>
        
    </div>
    </header>
    <div class="container">

    @yield('content')
    </div>

</div>
</body>
</html>