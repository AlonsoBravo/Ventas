<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\FamiliaProducto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        $familiaProductos = FamiliaProducto::all();
        return view ('productos.productos', compact('productos','familiaProductos'));
    }
    
    public function familia(){
        return view ('productos.productos');
    }
}
