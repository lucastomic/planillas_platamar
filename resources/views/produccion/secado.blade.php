@extends('produccion.layout')
    
@section('title')
    <h1>Planillas de secado</h1>
@endsection

@section('tabla')
    <div class="overflow">
        <table>
            <tr>
                <th>Lote</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Kg</th>
                <th>Cuna</th>
            </tr>
            @forelse($registros as $registro)
                <tr>
                    <td>{{$registro->lote}}</td>
                    <td>{{$registro->fecha}}</td>
                    <td>{{$registro->nombre}}</td>
                    <td>{{$registro->elemento1}}</td>
                    <td>{{$registro->cuna}}</td>
    
                    <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
                    <td><button><a href="{{url("/insertar_nombre/{$registro->id}")}}">Insertar nombre</a></button></td>
                </tr>
            @empty
                <tr><td colspan="5">Aún no hay registros subidos acerca de esta planilla.<td></tr>
            @endforelse
        </table>
    </div>
@endsection

@section('form')
    <input type="hidden" name="seccion" value="secado">

    <label>Cuna</label>   
    <input type="number" autocomplete="off" step="0.01" name="cuna">    
    
    <label>Kg cuna</label>   
    <input type="number" autocomplete="off" step="0.01" name="elemento1">
@endsection
