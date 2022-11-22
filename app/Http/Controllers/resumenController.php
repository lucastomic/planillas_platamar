<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resumen;
use DB;


class resumenController extends Controller
{
    public function create(Request $request){
        Resumen::create([
            "lote"=>$request->lote,
            "fecha"=>$request->fecha,
            "cajones_descargados"=>$request->cajones_descargados,
            "bachazas_descamadas"=>$request->bachazas_descamadas,
            "bachazas_sobrantes"=>$request->bachazas_sobrantes,
            "cajones_descabezados"=>$request->cajones_descabezados,
            "barriles_c"=>$request->cantidad_c,
            "barriles_c_ultimo"=>$request->ultimo_c,
            "barriles_d"=>$request->cantidad_d,
            "barriles_d_ultimo"=>$request->ultimo_d,
            "barriles_dp"=>$request->cantidad_dp,
            "barriles_dp_ultimo"=>$request->ultimo_dp,
            "barriles_pasta"=>$request->cantidad_pasta,
            "barriles_pasta_ultimo"=>$request->ultimo_pasta,
            "barriles_otros"=>$request->cantidad_otros,
            "barriles_otros_ultimo"=>$request->ultimo_otros,
            "table"=>"resumen",
        ]); 
                return redirect("/resumen");  
    }
    
    public function destroy($id){
        DB::table('resumens')->delete($id);
        
        return redirect("/resumen");
    }
}
