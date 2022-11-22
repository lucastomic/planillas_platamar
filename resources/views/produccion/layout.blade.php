<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/produccion.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <title>Planillas</title>
</head>
<body>
    <button><a href="{{url('/menu_produccion')}}">Volver al menú</a></button>
    @yield('title')
    @yield('tabla')
    <form action="{{url('/create_produccion')}}" class="displayCenter">
        <label for="lote">Lote</label>
        <input type="text" name="lote" autocomplete="off" value="{{$lote}}" required>
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="{{$fecha}}" required>
        @yield('form')
        <input type="submit" value="Enviar">
    </form>

    <script>
        const $buscador = document.getElementById("buscador"),
        $opciones = document.querySelectorAll(".option")

        if($buscador != null){
            $buscador.addEventListener("keyup", e=>{
                $opciones.forEach(el=>{
                    (el.dataset.value.toLowerCase().indexOf(e.target.value.toLowerCase()) == -1)
                    ? el.classList.add("invisible") : 
                    el.classList.remove("invisible");
                })
            });
        }
    </script>
</body>
</html>