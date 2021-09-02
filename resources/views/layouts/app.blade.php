<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Sistema de Gestão de Municípios - Governo do Paraná</title>
</head>
<body>
    <div class="container">
        <h1 class="fs-4 mt-2 mb-0">Sistema de Gestão de Municípios - Governo do Paraná</h1>
        <hr>
        <a class="btn btn-primary" href="{{ $btnURL }}">{{ $btnText }}</a>
        <hr>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
