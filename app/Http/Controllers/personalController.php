<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use DB;

class personalController extends Controller
{
    public function create(Request $request){
        Personal::create([
            "nombre_completo"=>$request->nombre_completo,
            "orden"=>$request->orden,
            "fecha_nacimiento"=>$request->fecha_nacimiento,
            "categoria"=>$request->categoria,
            "dni"=>$request->dni,
            "domicilio"=>$request->domicilio,
            "telefono"=>$request->telefono,
            "table"=>"personal",
        ]); 
        return redirect("/personal");  
    }
    
    public function destroy($id){
        DB::table('personals')->delete($id);
        
        return redirect("/personal");
    }
}

