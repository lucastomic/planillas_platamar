@extends('insumos.layout')
    
@section('title')
    <h1>Planillas de varios</h1>
@endsection

@section('tabla')
    <div class="overflow">
    <table>
        <tr>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Insumo</th>
            <th>Cantidad</th>
            <th>Cantidad por bulto</th>
            <th>Total</th>
        </tr>
        @forelse($registros as $registro)
            <tr>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->producto}}</td>
                <td>{{$registro->insumo}}</td>
                <td>{{$registro->cantidad}}</td>
                <td>{{$registro->cantidadPorBulto}}</td>
                <td>{{$registro->total}}</td>
                <td><button><a href="{{url("/confirmar_borrar/{$registro->id}/{$registro->table}")}}">Eliminar</a></button></td>
            </tr>
        @empty
            <tr><td colspan="6">Aún no hay registros subidos acerca de esta planilla.<td></tr>
        @endforelse
    </table>
    </div>
@endsection

@section('form')
    <input type="hidden" name="seccion" value="varios">

    <label for="producto">Producto</label>
    <select name="producto">
        <option value="Anchoero 90">Anchoero 90</option>
        <option value="Morronero 200">Morronero 200</option>
        <option value="Estrella 660 ">Estrella 660</option>
        <option value="PET">PET</option>
        <option value="General">General</option>
    </select>

    <label for="producto">Producto</label>
    <select name="insumo">
        <option value="Caja">Caja</option>
        <option value="Frasco">Frasco</option>
        <option value="Tapa">Tapa</option>
        <option value="Aceite">Aceite</option>
        <option value="Folex">Folex</option>
        <option value="Sal">Sal</option>
        <option value="Sal">Pand</option>
    </select>

    <label for="cantidad">Cantidad</label>
    <input type="number" autocomplete="off" name="cantidad">

    <label for="cantidadPorBulto">Cantidad por bulto</label>
    <input type="number" autocomplete="off" step="0.01" name="cantidadPorBulto">
@endsection
