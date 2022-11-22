@extends('insumos.layout')
    
@section('title')
    <h1>Planillas de pescado</h1>
@endsection

@section('tabla')
    <div class="overflow">

        <table>
            <tr>
                <th>Lote</th>
                <th>Nº remito</th>
                <th>Fecha</th>
                <th>Pesada camión</th>
                <th>Total cajones</th>
                <th>Cajón</th>
                <th>Temperatura</th>
                <th>Peso bruto</th>
                <th>Observaciones</th>
                <th>Bachazas</th>
                <th>Peso neto</th>
                <th>Piezas x2 kg</th>
            </tr>
            @forelse($registros as $registro)
                <tr>
                    <td>{{$registro->lote}}</td>
                    <td>{{$registro->nro_remito}}</td>
                    <td>{{$registro->fecha}}</td>
                    <td>{{$registro->pesada_camion}}</td>
                    <td>{{$registro->total_cajones}}</td>
                    <td>{{$registro->cajon}}</td>
                    <td>{{$registro->temperatura}}</td>
                    <td>{{$registro->peso_bruto}}</td>
                    <td>{{$registro->observaciones}}</td>
                    <td>{{$registro->bachazas}}</td>
                    <td>{{$registro->peso_neto}}</td>
                    <td>{{$registro->piezasx2kg}}</td>
                    <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
                </tr>
            @empty
                <tr><td colspan="11">Aún no hay registros subidos acerca de esta planilla.<td></tr>
            @endforelse
        </table>
    </div>
@endsection

@section('form')
    <input type="hidden" name="seccion" value="pescado">
    
    <label for="lote">Lote</label>
    <input type="text" name="lote" autocomplete="off" value="{{$lote}}" required>

    <label for="nro_remito">Nº Remito</label>
    <input type="number" name="nro_remito">
    <label for="origen">Origen</label>
    <input type="text" name="origen">
    <label for="pesada_camion">Pesada camion</label>   
    <input type="number" autocomplete="off" step="0.01" name="pesada_camion">
    <label for="total_cajones">Total cajones</label>
    <input type="number" autocomplete="off" step="0.01" name="total_cajones">
    <label for="cajon">Cajon</label>
    <input type="number" autocomplete="off" step="0.01" name="cajon">
    <label for="temperatura">Temperatura</label>
    <input type="number" autocomplete="off" step="0.01" name="temperatura">
    <label for="peso_bruto">Peso bruto</label>
    <input type="number" autocomplete="off" step="0.01" name="peso_bruto">
    <label for="observaciones">Observaciones</label>
    <input type="text" name="observaciones">
    <label for="bachazas">Bachazas</label>
    <input type="number" step="0.01" name="bachazas">
    <label for="peso_neto">Peso neto</label>
    <input type="number" autocomplete="off" step="0.01" name="peso_neto">
    <label for="piezasx2kg">Piezas x2kg</label>
    <input type="number" autocomplete="off" step="0.01" name="piezasx2kg">
@endsection
