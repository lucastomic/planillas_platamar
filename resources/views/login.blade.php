<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <h1>Inicio de sesión</h1>
    <form action="{{url('/confirmlogin')}}" method="post" class="displayCenter">
    @csrf
        <label for="user">Nombre</label>
        <input type="text" name="user" autocomplete="off">
        <label for="user">Contraseña</label>
        <input type="password" name="password">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>