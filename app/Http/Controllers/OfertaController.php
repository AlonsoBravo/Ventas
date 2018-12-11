<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FamiliaProducto;
use App\Models\Producto;
use App\Models\Oferta;
use App\Models\DetalleOferta;

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
                $salida .='<li value="'.$producto->codigo_producto.'">'.$producto->nombre_producto.'</li>';
            }
            $salida .= '<ul>';

            return Response($salida);
        }
    }

    public function guardarOferta(Request $request){

      DB::table('ofertas')->insert([
        'nombre_oferta' => $request->txNombreOferta,
        'fecha_inicio' => $request->txFechaInicio,
        'fecha_termino' => $request->txFechaTermino,
        'estado_ofertas' => 1,
      ]);

      $ofertas = collect([$request->idProdcuto, $request->txCantidad, $request->txDescuento]);
      $ultimoCodigoOferta = DB::table('ofertas')->max('codigo_oferta');

      $contador = 0;
      foreach ($ofertas[0] as $idProducto) {
        DB::table('detalle_oferta')->insert([
          'codigo_oferta' => $ultimoCodigoOferta,
          'codigo_producto' => $idProducto,
        ]);
        DB::table('detalle_oferta')
                 ->where('codigo_producto', $idProducto)
                 ->where('codigo_oferta',$ultimoCodigoOferta)
                 ->update(['cantidad'=>$ofertas[1][$contador],
                          'descuento'=>$ofertas[2][$contador]
                        ]);

        $contador++;
      }
      $contador = 0;

      return redirect('ofertas');
    }

    public function ofertaCriterio(Request $request){
      if($request->ajax()){

          $criterio = $request->query($ofertaCriterio);

          if($criterio == 1){
            $criterio = DB::statement('call mayorVendido_menorVendido()')
                        ->get();
          }
          return Response($criterio);
      }
    }
}
