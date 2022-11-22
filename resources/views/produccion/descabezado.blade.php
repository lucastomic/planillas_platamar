@extends('produccion.layout')
    
@section('title')
    <h1>Planillas de descabezado</h1>
@endsection

@section('tabla')
    <div class="overflow">
        <table>
            <tr>
                <th>Lote</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Valor</th>
            </tr>
            @forelse($registros as $registro)
                <tr>
                    <td>{{$registro->lote}}</td>
                    <td>{{$registro->fecha}}</td>
                    <td>{{$registro->nombre}}</td>
                    <td>{{$registro->producto}}</td>
                    <td>{{$registro->elemento1}}</td>
                    <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
                </tr>
            @empty
                <tr><td colspan="5">Aún no hay registros subidos acerca de esta planilla.<td></tr>
            @endforelse
        </table>
    </div>
@endsection

@section('form')
    <input type="hidden" name="seccion" value="descabezado">
    
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

    <label for="producto">Tipo</label>   

    <select name="producto">
        @foreach($productos as $producto)
            <option {{$produccionController::get_prod($producto, $productoD)}} value="{{$producto}}">{{$producto}}</option>
        @endforeach
    </select>

    <label for="elemento1">Peso</label>
    <input type="number" autocomplete="off" step="0.01" name="elemento1">
@endsection
