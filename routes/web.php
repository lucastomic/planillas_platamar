<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\produccionController;
use App\Http\Controllers\insumoController;
use App\Http\Controllers\horarioController;
use App\Http\Controllers\resumenController;
use App\Http\Controllers\personalController;
use App\Http\Middleware\isLogged;
use App\Models\produccion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Vista de logeo
Route::view('/', 'login')->name('login');

// Verificación si el login es correcto
Route::post('/confirmlogin', [userController::class, 'login']);

// Crear registros nuevos
Route::get('/create_produccion', [produccionController::class, 'create']);
Route::get('/create_insumos', [insumoController::class, 'create']);
Route::get('/create_horario', [horarioController::class, 'create']);
Route::get('/create_resumen', [resumenController::class, 'create']);
Route::get('/create_personal', [personalController::class, 'create']);

// Rutas afectadas por el middleware
Route::middleware(['isLogged'])->group(function () {
    // Menú
    Route::view('/menu_produccion', 'produccion.menu_produccion');

    // Planillas produccion
    Route::get('corte/{lote?}/{fecha?}', function($lote = "", $fecha = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "corte")->get();
        $registrosPersonal = DB::table('personals')->get();
        return view('produccion.corte', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote, 'registrosPersonal'=>$registrosPersonal]);
    });

    Route::get('envase/{lote?}/{fecha?}/{productoD?}', function($lote = "", $fecha = "", $productoD = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "envase")->get();
        $productos = ["90", "90F", "90R", "750", "1000", "30X3", "60X3", "30X3s", "60X3s", "30x3ENV", "60x3ENV", "100HGT", "200", "200F", "200R", "Sobres", "50X3", "50X3s", "50x3ENV","Pand", "Pand D", "Pand DP", "Pand P", "Trozos","Vacio1k"];
        $registrosPersonal = DB::table('personals')->get();
        return view('produccion.envase', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote, 'productos'=>$productos, 'producto_default'=>$productoD, 'produccionController'=>produccionController::class, 'registrosPersonal'=>$registrosPersonal]);
    });

    Route::get('filet/{lote?}/{fecha?}', function($lote = "", $fecha = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "filet")->get();
        $registrosPersonal = DB::table('personals')->get();

        return view('produccion.filet', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote, 'registrosPersonal'=>$registrosPersonal]);
    });
    Route::get('paños/{lote?}/{fecha?}', function($lote = "", $fecha = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "paños")->get();
        $registrosPersonal = DB::table('personals')->get();

        return view('produccion.panos', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote, 'registrosPersonal'=>$registrosPersonal]);
    });


    Route::get('descabezado/{lote?}/{fecha?}/{producto?}', function($lote = "", $fecha = "", $producto = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "descabezado")->get();
        $registrosPersonal = DB::table('personals')->get();
        $productos = ["DP", "D", "C", "Pasta", "Cajon"];
        return view('produccion.descabezado', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote, 'productoD'=>$producto, 'produccionController'=>produccionController::class, "productos"=>$productos, 'registrosPersonal'=>$registrosPersonal]);
    });

    Route::get('secado/{lote?}/{fecha?}', function($lote = "", $fecha = ""){
        $registros = DB::table('produccions')->orderBy('id','desc')->where("seccion", "=", "secado")->get();

        return view('produccion.secado', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote]);
    });

    // Confirmacion de borrado de registro
    Route::get("/confirmar_borrar/{id}/{table}", function($id, $table){
        switch($table){
            case "produccion":
                $registro = DB::table('produccions')->where('id', $id)->first();
                break;
            case "insumos":
                $registro = DB::table('insumos')->where('id', $id)->first();
                break;
            case "horarios":
                $registro = DB::table('horarios')->where('id', $id)->first();
                break;
            case "resumen":
                $registro = DB::table('resumens')->where('id', $id)->first();
                break;
            case "personal":
                $registro = DB::table('personals')->where('id', $id)->first();
                break;
        }
        return view('confirmar_borrar', ['registro'=>$registro]);
    });

    // Eliminacion de registro
    Route::delete('borrar_produccion/{id}', [produccionController::class, 'destroy']);
    Route::delete('borrar_insumo/{id}', [insumoController::class, 'destroy']);
    Route::delete('borrar_horario/{id}', [horarioController::class, 'destroy']);
    Route::delete('borrar_resumen/{id}', [resumenController::class, 'destroy']);
    Route::delete('borrar_personal/{id}', [personalController::class, 'destroy']);

    // Insertar nombre en planilla secado
    Route::get("/insertar_nombre/{id}", function($id){
        $registro = DB::table('produccions')->where('id', $id)->first();
        $registrosPersonal = DB::table('personals')->get();

        return view('insertar_nombre', ['registro'=>$registro, 'registrosPersonal'=>$registrosPersonal]);
    });

    // Proceso del formualrio de insertar_nombre
    Route::get("insert_name", [produccionController::class, 'insert_name']);

    // Planillas insumos

    Route::view('menu_insumos', 'insumos.menu_insumos');

    Route::get('pescado/{lote?}/{fecha?}', function($lote = "", $fecha = ""){
        $registros = DB::table('insumos')->orderBy('id','desc')->where("seccion", "=", "pescado")->get();

        return view('insumos.pescado', ['registros'=>$registros, 'fecha'=>$fecha, 'lote'=>$lote]);
    });

    Route::get('varios/{fecha?}', function($fecha = ""){
        $registros = DB::table('insumos')->orderBy('id','desc')->where("seccion", "=", "varios")->get();

        return view('insumos.varios', ['registros'=>$registros, 'fecha'=>$fecha]);
    });

    // Planilla horarios
    Route::get('horario/{fecha?}', function($fecha = ""){
        $registros = DB::table('horarios')->orderBy('id','desc')->get();
        $registrosPersonal = DB::table('personals')->get();
        return view('horario.horario', ['registros'=>$registros, 'fecha'=>$fecha, 'registrosPersonal'=>$registrosPersonal]);
    });

    Route::get("/insertar_salida/{id}", function($id){
        $registro = DB::table('horarios')->where('id', $id)->first();
        return view('horario.insertar_salida', ['registro'=>$registro]);
    });

    Route::get("insert_salida", [horarioController::class, 'insert_salida']);

    
    // Planilla resumen
    Route::get('resumen/{fecha?}', function($fecha = ""){
        $registros = DB::table('resumens')->orderBy('id','desc')->get();

        return view('resumen.resumen', ['registros'=>$registros, 'fecha'=>$fecha]);
    });

    // Planilla personal
    Route::get('personal', function(){
        $registros = DB::table('personals')->get();

        return view('personal.personal', ['registros'=>$registros]);
    });
});

