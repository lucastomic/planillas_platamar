<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menu_produccion.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <div class="displayCenter">
        <h1>Planillas de:</h1>
        <ul class="displayCenter">
            <li><a href="{{url('/corte')}}">Corte</a></li>
            <li><a href="{{url('/envase')}}">Envase</a></li>
            <li><a href="{{url('/filet')}}">Filet</a></li>
            <li><a href="{{url('/secado')}}">Secado</a></li>
            <li><a href="{{url('/descabezado')}}">Descabezado</a></li>
            <li><a href="{{url('/horario')}}">Horario</a></li>
        </ul>
    </div>
</body>
</html>