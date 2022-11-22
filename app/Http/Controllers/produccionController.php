<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produccion;
use DB;

class produccionController extends Controller
{
    public function create(Request $request){
        $elementos = [$request->elemento1, $request->elemento2, $request->elemento3, $request->elemento4, $request->elemento5];
        $i = 0;
        foreach($elementos as $elemento){
            $elementos[$i] = str_replace(",", ".", $elemento);
            if($elementos[$i]=="") $elementos[$i] = 0;
            $i++;
        }
        $suma = array_sum($elementos);
        if($suma === 0) $suma = null;
        $request->trozos === null ? $trozos = 0 : $trozos = $request->trozos;
        produccion::create([
            "lote"=>$request->lote,
            "nombre"=>$request->nombre,
            "fecha"=>$request->fecha,
            "elemento1"=>$elementos[0],
            "elemento2"=>$elementos[1],
            "elemento3"=>$elementos[2],
            "elemento4"=>$elementos[3],
            "elemento5"=>$elementos[4],
            "suma"=>$suma,
            "trozos"=>$trozos,
            "seccion"=> $request->seccion,
            "producto"=>$request->producto,
            "cuna"=>$request->cuna,
            "table"=>"produccion",
        ]); 

        if($request->seccion === "envase" or $request->seccion ==="descabezado"){
            return redirect("/$request->seccion/$request->lote/$request->fecha/$request->producto");  
        }else{
            return redirect("/$request->seccion/$request->lote/$request->fecha");  
        }
    }

    public function destroy($id){
        $seccion = produccion::find($id)->seccion;

        DB::table('produccions')->delete($id);
        
        return redirect("/$seccion");
    }

    public static function get_prod($valor, $producto){
        if(!strcmp($valor, $producto)){
          echo "selected='selected'";
        }
    }

    public function insert_name(Request $request){
        $registro = produccion::find($request->id);
        $registro->nombre = $request->nombre;
        $registro->save();
        return redirect("/secado");
    }
}
