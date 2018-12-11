@include('layouts.header')

@yield('header')

<script>
function agregarProducto(tableid){
  // Se obtiene la tabla:
  var table = document.getElementById(tableid).getElementsByTagName('tbody')[0];

  // Se crea una nueva fila
  var row = table.insertRow(table.rows.length);
  // Inserta nuevavs celdas en la tabla
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);

  // Agrega el contenido a la tabla:

  cell1.innerHTML=  '<button type="button" class="btn btn-danger"  onclick='+"'"+'document.getElementById(' + '"'+ tableid + '"' + ').deleteRow(this.parentNode.parentNode.rowIndex)'+"'>"+ '<i class="fas fa-minus-circle"></i></button>';
  var elemInput = $('<input type="text" class="form-control txProducto" placeholder="Nombre del producto" name="txProducto"><input type="hidden" class="idProducto" name="idProdcuto[]" value="">');
  $(cell2).append(elemInput);
  $(cell2).append('<div class="sugerencia" style="width:150%;"></div>');
  cell3.innerHTML = '<input type="number" class="form-control" id="txCantidad" name="txCantidad[]" min="1">';
  cell4.innerHTML = '<input type="number" class="form-control" id="txDescuento" name="txDescuento[]" min="1" max="90">';

  elemInput.keyup(function(){
    var query = $(this).val();
    var objCell = $(this).parent();
    if(query != ''){
      var _token = $('input[name="token"]').val();
      $.ajax({
        url:"{{route('sugerencia')}}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          var divSugerencia = objCell.find("div.sugerencia")
          divSugerencia.fadeIn();
          divSugerencia.html(data);

          divSugerencia.find("li").click(function() {
            objCell.find("input.txProducto").val($(this).text());
            objCell.find("input.idProducto").attr("value",($(this).val()));
            divSugerencia.remove();
          })
        }
      });
    }
  });
}

$(document).on('change', '.ofertaCriterio', function(){
  $ofertaCriterio = $('#ofertaCriterio').val();
  $.ajax({
    url:"{{route('criterioVentas')}}",
    type:'POST',
    data:{$ofertaCriterio},
    succes:function(data){
      alert('hola');
    }
  });

});
</script>

<div class="container-fluid">
  <form action="{{route('guardar_oferta')}}" method="POST">
    {{ csrf_field() }}
    <div id="nueva_oferta" style="display:block;">
      <h1>Datos Oferta</h1>
      <div class="row">
        <div class="col-md-3">
          <label>Nombre Oferta</label>
          <input type="text" class="form-control" id="txNombreOferta" name="txNombreOferta">
        </div>
        <div class="col-md-2">
          <label>Fecha inicio</label>
          <input type="date" class="form-control" id="txFechaInicio" name="txFechaInicio">
        </div>
        <div class="col-md-2">
          <label>Fecha Termino</label>
          <input type="date" class="form-control" id="txFechaTermino" name="txFechaTermino">
        </div>
      </div>
      <br>
      <h1>Detalle Oferta</h1>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <br>
          <div class="row">
            <div class="col-md-6">
              <select class="ofertaCriterio form-control" value="" id="ofertaCriterio">
                <option value="">--Criterio--</option>
                <option value="1">MAYOR VENDIDO -- MENOR VENDIDO</option>
                <option value="2">MAYOR STOCK -- MENOR STOCK</option>
              </select>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-success">Guardar Oferta</button>
              <button id="agregar_producto" type="button" class="btn btn-success agregar_producto" style="position: relative;width:60px;height:40px;" onclick="agregarProducto('tblOferta');">
                <i class="fas fa-plus-circle" style="font-size:25px"></i>
              </button>
            </div>
          </div>
          <br>
          <div class="row">
              <table id="tblOferta" class="table" name>
                <thead>
                  <th>Eliminar</th>
                  <th style="display:none;">codigo producto</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>descuento</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot></tfoot>
              </table>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>

@include('layouts.footer')

@yield('footer')
