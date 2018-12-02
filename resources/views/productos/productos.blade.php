@include('layouts.header')

@yield('header')


<div class="row">
  <div class="col-md-12">
    <input type="radio" name="action" onclick="prueba();" id="rdeditar"  checked><label for="rdeditar"> Ver productos</label></input>
    <input type="radio" name="action" onclick="prueba();" id="rdagregar"><label for="rdagregar"> Agregar producto</label></input>
  </div>
</div>
<form class="" action="index.html" method="post" id="ingreso_producto" style="display:none;">
  <div class="row">
      <div class="col-md-2">
        <label for="">Codigo producto</label>
        <input type="text" name="" value="" class="form-control">
      </div>
  </div>
  <div class="row">
      <div class="col-md-6">
        <label for="">Nombre producto</label>
        <input type="text" name="" value="" class="form-control">
      </div>
  </div>
  <div class="row">
      <div class="col-md-2">
        <label for="">Valor unitario</label>
        <input type="text" name="" value="" class="form-control">
      </div>
  </div>
  <div class="row">
      <div class="col-md-2">
        <label for="">Stock</label>
        <input type="number" name="" value="" class="form-control" min="0">
      </div>
      <div class="col-md-2">
        <label for="">Stock minimo</label>
        <input type="number" name="" value="" class="form-control" min="0">
      </div>
      <div class="col-md-2">
        <label for="">Stock maximo</label>
        <input type="number" name="" value="" class="form-control" min="0">
      </div>
  </div>
</form>

<form class="" action="" method="GET" id="productos">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-3">
      <label for="lista_producto">Familia productos</label>
      <select class="form-control" id="lista_producto" name="lista_producto">
        <option value="">--- Escoger producto ---</option>
        @foreach($familiaProductos as $familiaProducto)
        <option name="familia_producto" value="{{ $familiaProducto -> codigo_Familia }}">{{ $familiaProducto -> nombre_familia}}</option>
        @endforeach
      </select>
      <br>
      <button class="btn btn-primary" type="submit" role="button">Buscar producto por familia</button>
    </div>
  </div>

  <br>
  <br>

  <div class="row">
    <div class="col-md-6">
      <table class="table" id="tabla_producto">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo producto</th>
            <th scope="col">Nombre producto</th>
            <th scope="col">Valor unitario</th>
            <th scope="col">Stock</th>
            <th scope="col">Stock minimo</th>
            <th scope="col">Stock máximo</th>
            <th scope="col">Estado producto</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $producto)
          <tr>
               <td>{{ $producto->codigo_producto }}</td>
               <td>{{ $producto->nombre_producto }}</td>
               <td>{{ $producto->valor_unitario }}</td>
               <td>{{ $producto->stock }}</td>
               <td>{{ $producto->stock_minimo }}</td>
               <td>{{ $producto->stock_maximo }}</td>
               <td>{{ $producto->estado }}</td>
           </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</form>
</body>

<script>
$(document).ready( function () {
    $('#my_table').DataTable();
});

 function prueba(){

   var editar = document.getElementById("rdeditar");
   var agregar = document.getElementById("rdagregar");

   if (editar.checked){
     document.getElementById('productos').style.display='block';
     document.getElementById('ingreso_producto').style.display='none';
   }else if (agregar.checked){
     document.getElementById('ingreso_producto').style.display='block';
     document.getElementById('productos').style.display='none';
   }

 }

</script>

@include('layouts.footer')

@yield('footer')
