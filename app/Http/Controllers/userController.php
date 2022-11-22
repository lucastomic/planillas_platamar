<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(Request $request){
        $password = $request->password;
        if(!strcasecmp($request->user, "andrea") and !strcasecmp($request->password, "otamendi")){
            session(['logged' => "produccion"]);
            return redirect('/menu_produccion');
        }else if(!strcasecmp($request->user, "soledad") or !strcasecmp($request->user, "katy") or !strcasecmp($request->user, "marcos") && !strcasecmp($request->password, "otamendi")){
            session(['logged' => "insumos"]);
            return redirect('/menu_insumos');
        }else{
            return redirect('/');
        };

    }
}
