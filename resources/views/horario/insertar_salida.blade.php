<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/insertar_salida.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <div class="displayCenter">
        <table>
            <tr>
                <td>Nombre</td>
                <td>Fecha</td>
            </tr>
            <tr>
                <td>{{$registro->nombre}}</td>
                <td>{{$registro->fecha}}</td>
            </tr>
        </table>
    
        <form action="{{url('insert_salida')}}" class="displayCenter">
            <label for="salida">Salida</label>
            <input type="time" name="salida">
            <input type="hidden" name="id" value="{{$registro->id}}">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>