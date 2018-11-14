@include('layouts.header')

@yield('header')


<div class="row">
  <div class="col-md-3">
    <input type="radio" name="action" onclick="prueba();" id="rdeditar"><label for="rdeditar"> Ver productos</label></input>
    <input type="radio" name="action" onclick="prueba();" id="rdagregar"><label for="rdagregar"> Agregar producto</label></input>
  </div>
</div>
<form class="" action="index.html" method="post" id="ingreso_producto">
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

<form class="" action="index.html" method="post" id="productos">
  <div class="row">
    <div class="col-md-3">
      <label for="lista_producto">Familia productos</label>
      <select class="form-control" id="lista_producto" name="lista_producto">
        <option value="">---seleccionar producto---</option>
        <option value="">Caca</option>
      </select>
    </div>
  </div>

  <br>
  <br>

  <div class="row">
    <div class="col-md-6">
      <table class="table">
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

        </tbody>
      </table>
    </div>
  </div>
</form>
</body>

<script>
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
