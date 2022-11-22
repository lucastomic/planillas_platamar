<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/horario.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
<button><a href="{{url('/menu_insumos')}}">Volver al menu</a></button>
    <h1>Planillas de personal</h1>
    <div class="overflow">
    <table>
        <tr>
            <th>Orden</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>DNI</th>
            <th>Fecha de nacimiento</th>
            <th>Domicilio</th>
            <th>Teléfono</th>
        </tr>
        @forelse($registros as $registro)
            <tr>
                <td>{{$registro->orden}}</td>
                <td>{{$registro->nombre_completo}}</td>
                <td>{{$registro->categoria}}</td>
                <td>{{$registro->dni}}</td>
                <td>{{$registro->fecha_nacimiento}}</td>
                <td>{{$registro->domicilio}}</td>
                <td>{{$registro->telefono}}</td>
                <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
            </tr>
        @empty
            <tr><td colspan="6">Aún no hay registros subidos acerca de esta planilla.<td></tr>
        @endforelse
    </table>
    </div>
    <form action="{{url('create_personal')}}" class="displayCenter">
        
        <label for="orden">Orden</label>
        <input type="number" name="orden">

        <label for="nombre_completo">Nombre completo</label>
        <input type="text" name="nombre_completo">
        
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <option value="Encargado">Encargado</option>
            <option value="Peón">Peón</option>
            <option value="Ayudante">Ayudante</option>
            <option value="Barrilero">Barrilero</option>
        </select>

        <label for="dni">DNI</label>
        <input type="number" name="dni">

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento">

        <label for="domicilio">Domicilio</label>
        <input type="text" name="domicilio">

        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono">

        <input type="submit" value="Enviar">

    </form>
</body>
</html>