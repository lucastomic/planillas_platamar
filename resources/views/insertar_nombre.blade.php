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
    <div class="displayCenter">
        <table>
            <tr>
                <td>Lote</td>
                <td>Fecha</td>
                <td>cuna</td>
            </tr>
            <tr>
                <td>{{$registro->lote}}</td>
                <td>{{$registro->fecha}}</td>
                <td>{{$registro->cuna}}</td>
            </tr>
        </table>
    
        <form action="{{url('insert_name')}}" class="displayCenter">
            <label for="nombre">Nombre</label>
            <input type="search" id="buscador" autocomplete="off">  
            <div class="overflowShort displayCenter">
                @foreach($registrosPersonal as $registroPersonal)
                    <div class="option" data-value="{{$registroPersonal->nombre_completo}}">
                        <input type="radio" name="nombre" value="{{$registroPersonal->nombre_completo}}">
                        <label>{{$registroPersonal->nombre_completo}}</label>
                    </div>
                @endforeach
            </div>
            <input type="hidden" name="id" value="{{$registro->id}}">
            <input type="submit" value="Enviar">
        </form>
    </div>
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
</html>