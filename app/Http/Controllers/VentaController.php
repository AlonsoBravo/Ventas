<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Oferta;
use App\Models\DetalleOferta;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index(){
        $listaproductos = Producto::all();
        $ofertas = DB::table('ofertas')->get();
        $prodofertas = DB::table('detalle_oferta')->get();
        return view('ventas.ventas',compact('listaproductos','ofertas','prodofertas'));
    }
    
    public function DetalleOfertas(Request $request){
        $id = $_GET['idoferta'];
        $detpro = DB::table('detalle_oferta')
            ->select('detalle_oferta.codigo_producto','descuento','nombre_producto','valor_unitario','cantidad')
            ->join('productos','detalle_oferta.codigo_producto','=','productos.codigo_producto')
            ->where('codigo_oferta','=',$id)
            ->get();
        $salida = '
        <table class="table">    
        <thead>
            <tr>
                <th scope="col">Cod. Producto</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Valor Unitario</th>
                <th scope="col">Descuento</th>
            </tr>
        </thead>
        <tbody>';
        $valpac=0;
        foreach ($detpro as $dt){
            $descun = $dt->descuento;
            $valpac = $valpac+$dt->valor_unitario;
            $cantid = $dt->cantidad;
            $salida .= '<tr>';
            $salida .= '<td>'.$dt->codigo_producto.'</td>';
            $salida .= '<td>'.$dt->nombre_producto.'</td>';
            $salida .= '<td class="text-right">'.$dt->valor_unitario.'</td>';
            $salida .= '<td class="text-right">'.$dt->descuento.' %</td>';
            $salida .= '</tr>';
            }
        $valpac = number_format($valpac-(($valpac*$descun)/100),0,'','');
        $salida .= '</tbody></table>';
        $salida .= '<input type="hidden" name="valorfinal" id="valorfinal" value="'.$valpac.'" />';
        $salida .= '<input type="hidden" name="maximo" id="maximo" value="'.$cantid.'" />';

        return Response($salida);
    }
        
    public function GuardarVenta(Request $request){
        $tipo = $request->quevender;
        if ($tipo==1){
            $listaprod  = $request->lista-producto;
            $lp         = explode("|",$listaprod);
            $codprod    = $lp[0];
            $cantidad   = $request->cantidad;
            $valoruni   = $request->unitario;
            $totalpro   = $request->subtotal;
            
            $max = DB::table('ventas')->max('id_venta');
            
        } else if ($tipo==2) {
            $max = DB::table('ventas')->max('id_venta');
        } else {
            $max = DB::table('ventas')->max('id_venta');
        }
        return $max;
    }
    
}
