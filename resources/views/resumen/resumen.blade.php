<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/resumen.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <button><a href="{{url('/menu_insumos')}}">Volver al menu</a></button>
    <h1>Resumen diario</h1>
    <div class="overflow">
    <table>
        <tr>
            <th>Fecha</th>
            <th>Lote</th>
            <th>Cajones descargados</th>
            <th>Bachazas descamadas</th>
            <th>Bachazas sobrantes</th>
            <th>Cajones descabezados</th>
            <th>Cantidad barriles C</th>
            <th>Último barriles C</th>
            <th>Cantidad barriles D</th>
            <th>Último barriles D</th>
            <th>Cantidad barriles DP</th>
            <th>Último barriles DP</th>
            <th>Cantidad barriles Pasta</th>
            <th>Último barriles Pasta</th>
            <th>Cantidad barriles Otros</th>
            <th>Último barriles Otros</th>
        </tr>
        @forelse($registros as $registro)
            <tr>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->lote}}</td>
                <td>{{$registro->cajones_descargados}}</td>
                <td>{{$registro->bachazas_descamadas}}</td>
                <td>{{$registro->bachazas_sobrantes}}</td>
                <td>{{$registro->cajones_descabezados}}</td>
                <td>{{$registro->barriles_c}}</td>
                <td>{{$registro->barriles_c_ultimo}}</td>
                <td>{{$registro->barriles_d}}</td>
                <td>{{$registro->barriles_d_ultimo}}</td>
                <td>{{$registro->barriles_dp}}</td>
                <td>{{$registro->barriles_dp_ultimo}}</td>
                <td>{{$registro->barriles_pasta}}</td>
                <td>{{$registro->barriles_pasta_ultimo}}</td>
                <td>{{$registro->barriles_otros}}</td>
                <td>{{$registro->barriles_otros_ultimo}}</td>
                <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
            </tr>
        @empty
            <tr><td colspan="10">Aún no hay registros subidos acerca de esta planilla.<td></tr>
        @endforelse
    </table>
    </div>
    <form action="{{url('/create_resumen')}}">
    <div class="displayCenter">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" required>

        <label for="lote">Lote</label>
        <input type="text" name="lote" autocomplete="off" required>

        <label for="cajones_descargados">Cajones descargados</label>
        <input type="number" autocomplete="off" name="cajones_descargados">
    
        <label for="bachazas_descamadas">Bachazas descamadas</label>
        <input type="number" autocomplete="off" step="0.01" name="bachazas_descamadas">

        <label for="bachazas_sobrantes">Bachazas sobrantes</label>
        <input type="number" autocomplete="off" step="0.01" name="bachazas_sobrantes">

        <label for="cajones_descabezados">Cajones descabezados</label>
        <input type="number" autocomplete="off" step="0.01" name="cajones_descabezados">
    </div>
        <table class="tableBarriles">
            <tr>
                <th>Barriles</th>
                <th>Cantidad</th>
                <th>Último nº</th>
            </tr>
            <tr>
                <td>C</td>
                <td><input type="number" autocomplete="off" step="0.01" name="cantidad_c"></td>
                <td><input type="number" autocomplete="off" name="ultimo_c"></td>
            </tr>
            <tr>
                <td>D</td>
                <td><input type="number" autocomplete="off" step="0.01" name="cantidad_d"></td>
                <td><input type="number" autocomplete="off" name="ultimo_d"></td>
            </tr>
            <tr>
                <td>DP</td>
                <td><input type="number" autocomplete="off" step="0.01" name="cantidad_dp"></td>
                <td><input type="number" autocomplete="off" name="ultimo_dp"></td>
            </tr>
            <tr>
                <td>Pasta</td>
                <td><input type="number" autocomplete="off" step="0.01" name="cantidad_pasta"></td>
                <td><input type="number" autocomplete="off" name="ultimo_pasta"></td>
            </tr>
            <tr>
                <td>Otros</td>
                <td><input type="number" autocomplete="off" step="0.01" name="cantidad_otros"></td>
                <td><input type="number" autocomplete="off" name="ultimo_otros"></td>
            </tr>
        </table>
        <div class="displayCenter">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>