<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FamiliaProducto;
use App\Models\Producto;

class OfertaController extends Controller{

    public function index(){
        $familiaProductos = FamiliaProducto::all();

        return view ('ofertas.nueva_oferta', compact('familiaProductos'));
    }

    public function buscarSugerenciaDeProducto(Request $request){
        if($request->get('query')){

            $query = $request->get('query');
            $productos = DB::table('productos')
                          ->where('nombre_producto','LIKE','%'.$query.'%')
                          ->get();

            $salida = '<ul class="dropdown-menu" style="display:block; position:relative">';

            foreach ($productos as $producto) {
                $salida .='<li><a href="#" style="text-decoration:none; color:#000000;">'.$producto->nombre_producto.'</a></li>';
            }
            $salida .= '<ul>';

            echo $salida;
        }
    }
}
