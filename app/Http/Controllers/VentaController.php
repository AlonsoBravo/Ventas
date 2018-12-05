<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Oferta;
use App\Models\DetalleOferta;

class VentaController extends Controller
{
    public function index(){
        $listaproductos = Producto::all();
        $ofertas = DB::table('ofertas')->get();
        $prodofertas = DB::table('detalle_oferta')->get();
        return view('ventas.ventas',compact('listaproductos','ofertas','prodofertas'));
    }
}
