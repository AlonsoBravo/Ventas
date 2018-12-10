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

        $idProducto=DB::table('productos')->max('codigo_producto');

        DB::table('productos')->insert([
            'codigo_producto'=>$idProducto+1,
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


  public function familia(){
    $familiaProducto = FamiliaProducto::all();
    return view ('productos.nueva_familia',compact('familiaProducto'));
  }

  public function crearNuevaFamilia(Request $request){

    $idFamilia = DB::table('familia_productos')->max('codigo_familia');

    DB::table('familia_productos')->insert([
      'codigo_familia'=> $idFamilia+1,
      'nombre_familia'=>$request->nomFamilia,
    ]);

    return redirect()->route('nueva_familia');
  }

  public function modificarFamiliaProducto(Request $request){
    DB::table('familia_productos')
            ->where('codigo_Familia', $request->codFamilia)
            ->update(['nombre_familia' => $request->nuevo_nombre]);

    return redirect()->route('nueva_familia');
  }
}
