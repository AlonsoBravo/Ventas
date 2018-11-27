<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Controllers\Controller;

class VentaController extends Controller
{
    public function index(){
        $listaproductos = Producto::all();
        return view('ventas.ventas',compact('listaproductos'));
    }
}
