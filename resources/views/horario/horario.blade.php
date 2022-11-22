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
<button><a href="{{(session('logged') == 'produccion') ? url('/menu_produccion') : url('/menu_insumos')}}">Volver al menu</a></button>
    <h1>Planillas de horario</h1>
    <div class="overflow">
    <table>
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Total</th>
            <th>Categoría</th>
        </tr>
        @forelse($registros as $registro)
            <tr>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->nombre}}</td>
                <td>{{$registro->entrada}}</td>
                <td>{{$registro->salida}}</td>
                <td>{{$registro->total}}</td>
                <td>{{$registro->categoria}}</td>
                <td><button><a href="{{url("/insertar_salida/{$registro->id}")}}">Insertar salida</a></button></td>
                <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
            </tr>
        @empty
            <tr><td colspan="6">Aún no hay registros subidos acerca de esta planilla.<td></tr>
        @endforelse
    </table>
    </div>
    <form action="{{url('create_horario')}}" class="displayCenter">
        
        <label for="nombre">Nombre</label>
        <input type="search" id="buscador" autocomplete="off">  
        <div class="overflowShort displayCenter">
            @foreach($registrosPersonal as $registro)
            <div class="option" data-value="{{$registro->nombre_completo}}">
                <input type="radio" name="nombre" value="{{$registro->nombre_completo}}">
                <label>{{$registro->nombre_completo}}</label>
            </div>
            @endforeach
        </div>
        
        <label for="fecha">Fecha</label>
        <input type="date" value="{{$fecha}}" name="fecha" required>

        <label for="entrada">Entrada</label>
        <input type="time" name="entrada" required>

        <label for="salida">Salida</label>
        <input type="time" name="salida">

        <label for="categoria">Categoría</label>
        <select name="categoria" required>
            <option value="Encargado">Encargado</option>
            <option value="Peon">Peón</option>
            <option value="Ayudante">Ayudante</option>
            <option value="Barrilero">Barrilero</option>
        </select>

        <input type="submit" value="Enviar">

    </form>

    <script>
        const $buscador = document.getElementById("buscador"),
        $opciones = document.querySelectorAll(".option")

        if($buscador != null){
        $buscador.addEventListener("keyup", e=>{
            $opciones.forEach(el=>{
                (el.dataset.value.toLowerCase().indexOf(e.target.value.toLowerCase()) == -1) ? el.classList.add("invisible") : el.classList.remove("invisible");
            })
        });
        }
    </script>
</body>
</body>
</html>