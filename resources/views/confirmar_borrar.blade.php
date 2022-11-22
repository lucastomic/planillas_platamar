<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/confirmar_borrar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <h1>¿Estás seguro/a de borrar el siguiente registro?</h1>
<div class="displayCenter">

    <table>
        @if($registro->table == "produccion")
            <tr>
                <td>Nombre</td>
                <td>Lote</td>
                <td>Fecha</td>
            </tr>
            <tr>
                <td>{{$registro->nombre}}</td>
                <td>{{$registro->lote}}</td>
                <td>{{$registro->fecha}}</td>
            </tr>
        @elseif($registro->table == "insumos")
            @if($registro->seccion == "varios")
                <tr>
                    <td>Fecha</td>
                    <td>Producto</td>
                    <td>Insumo</td>
                </tr>
                <tr>
                    <td>{{$registro->fecha}}</td>
                    <td>{{$registro->producto}}</td>
                    <td>{{$registro->insumo}}</td>
                </tr>
            @else
                <tr>
                    <td>Origen</td>
                    <td>Lote</td>
                    <td>Fecha</td>
                </tr>
                <tr>
                    <td>{{$registro->origen}}</td>
                    <td>{{$registro->lote}}</td>
                    <td>{{$registro->fecha}}</td>
                </tr>
            @endif
        @elseif($registro->table == "horarios")
            <tr>
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Categoria</td>
            </tr>
            <tr>
                <td>{{$registro->nombre}}</td>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->categoria}}</td>
            </tr>
        @elseif($registro->table == "resumen")
            <tr>
                <td>Fecha</td>
                <td>Lote</td>
            </tr>
            <tr>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->lote}}</td>
            </tr>
        @elseif($registro->table == "personal")
            <tr>
                <td>Nombre</td>
                <td>DNI</td>
                <td>Categoría</td>
            </tr>
            <tr>
                <td>{{$registro->nombre_completo}}</td>
                <td>{{$registro->dni}}</td>
                <td>{{$registro->categoria}}</td>
            </tr>
        @endif
        <tr>
            <td>
                @if($registro->table === "produccion")
                    <form method="POST" action="{{ url("borrar_produccion/{$registro->id}") }}">
                @elseif($registro->table === "insumos")
                    <form method="POST" action=" {{ url("borrar_insumo/{$registro->id}") }}">
                @elseif($registro->table === "horarios")
                    <form method="POST" action="{{ url("borrar_horario/{$registro->id}") }}">
                @elseif($registro->table === "resumen")
                    <form method="POST" action="{{ url("borrar_resumen/{$registro->id}") }}">
                @elseif($registro->table === "personal")
                    <form method="POST" action="{{ url("borrar_personal/{$registro->id}") }}">
                @endif
                @csrf
                @method('DELETE')
                    <button type="submit">Sí</button>
                </form>
            </td>
            <td></td>
            <td>
                <button><a href='{{ URL::previous() }}'>No</a></button>
            </td>
        </tr>
    </table>
</div>
</body>
</html>