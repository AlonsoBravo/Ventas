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

    public function crearNuevoProducto(Request $request){

        $familia = $request->get('lista_producto');


        DB::table('productos')->insert([
            'codigo_producto'=>$request->codProducto,
            'codigo_familia' =>$request->lista_producto,
            'rut_proveedor' =>$request->rutProveedor,
            'nombre_producto'=>$request->nomProducto,
            'valor_unitario'=>$request->valUnitario,
            'stock'=>$request->stock,
            'stock_minimo'=>$request->stockMin,
            'stock_maximo'=>$request->stockMax,
        ]);

        return redirect()->route('productos')->with('mensaje','ok');
    }
}
