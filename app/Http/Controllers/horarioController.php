<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use DB;

class horarioController extends Controller
{
    public function create(Request $request){
        // Hacemos lo siguiente para obtener el total de tiempo que el empleado estuvo activo:
        $entrada = $request->entrada;
        $salida = $request->salida;
        if($salida != null){
            $entradaPartes = explode(":", $entrada);
            $salidaPartes = explode(":", $salida);
    
            $totalSegundos = $salidaPartes[0]*3600 + $salidaPartes[1]*60 - $entradaPartes[0]*3600 - $entradaPartes[1]*60;
            
            $horas = floor($totalSegundos / 3600);
            $minutos = floor(($totalSegundos - ($horas * 3600)) / 60);
            $segundos = $totalSegundos - ($horas * 3600) - ($minutos * 60);
        
            $total =  $horas . ':' . $minutos . ":" . $segundos;
        }else{
            $total = null;
        }

        Horario::create([
            "nombre"=>$request->nombre,
            "fecha"=>$request->fecha,
            "entrada"=>$request->entrada,
            "salida"=>$request->salida,
            "total"=>$total,
            "categoria"=>$request->categoria,
            "table"=>"horarios",
        ]); 
        return redirect("/horario/$request->fecha");  
    }

    public function destroy($id){
        DB::table('horarios')->delete($id);
        
        return redirect("/horario");
    }

    public function insert_salida(Request $request){
        $registro = Horario::find($request->id);
        $registro->salida = $request->salida;

        // Hacemos lo siguiente para obtener el total de tiempo que el empleado estuvo activo:
        $entrada = $registro->entrada;
        $salida = $request->salida;

        $entradaPartes = explode(":", $entrada);
        $salidaPartes = explode(":", $salida);

        $totalSegundos = $salidaPartes[0]*3600 + $salidaPartes[1]*60 - $entradaPartes[0]*3600 - $entradaPartes[1]*60;
        
        $horas = floor($totalSegundos / 3600);
        $minutos = floor(($totalSegundos - ($horas * 3600)) / 60);
        $segundos = $totalSegundos - ($horas * 3600) - ($minutos * 60);
    
        $total =  $horas . ':' . $minutos . ":" . $segundos;

        $registro->total = $total;
        $registro->save();
        return redirect("/horario/$registro->fecha");
    }
}
