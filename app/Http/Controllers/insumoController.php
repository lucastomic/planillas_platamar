<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use DB;


class insumoController extends Controller
{
    public function create(Request $request){
        Insumo::create([
            "lote"=>$request->lote,
            "origen"=>$request->origen,
            "nro_remito"=>$request->nro_remito,
            "fecha"=>$request->fecha,
            "bachazas"=> $request->bachazas,
            "temperatura"=> $request->temperatura,
            "pesada_camion"=>$request->pesada_camion,
            "peso_neto"=>$request->peso_neto,
            "total_cajones"=>$request->total_cajones,
            "cajon"=>$request->cajon,
            "piezasx2kg"=>$request->piezasx2kg,
            "peso_bruto"=>$request->peso_bruto,
            "observaciones"=>$request->observaciones,
            "seccion"=>$request->seccion,
            "insumo"=>$request->insumo,
            "producto"=>$request->producto,
            "cantidad"=>$request->cantidad,
            "cantidadPorBulto"=>$request->cantidadPorBulto,
            "total"=>$total = $request->cantidad * $request->cantidadPorBulto,
            "table"=>"insumos",
        ]); 
            if($request->seccion === "pescado"){
                return redirect("/$request->seccion/$request->lote/$request->fecha");  
            }else{
                return redirect("/$request->seccion/$request->fecha");  
            }
    }

    public function destroy($id){
        $seccion = Insumo::find($id)->seccion;

        DB::table('insumos')->delete($id);
        
        return redirect("/$seccion");
    }
}
