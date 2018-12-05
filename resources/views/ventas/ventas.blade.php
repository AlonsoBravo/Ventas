@include('layouts.header')

@yield('header')
<style>
    #nover{ display: none !important; visibility: hidden !important; color:white; }
    .vendeproducto, .vendeoferta { display: none; }
</style>

<form>
    
<div class="row">
    <div class="vender">
        <input type="radio" name="quevender" value="1"> <label> Vender Producto </label>
        <input type="radio" name="quevender" value="2"> <label> Vender Oferta </label>
    </div>
</div>    
    
<div class="vendeproducto">
    <div class="row">
        <div class="col-xs-12 col-md-5">Producto</div>
        <div class="col-xs-12 col-md-2">Cantidad</div>
        <div class="col-xs-12 col-md-2">V.Unitario</div>
        <div class="col-xs-12 col-md-3">Total</div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <select class="form-control" id="lista-producto" name="lista-producto">
                <option value=""> Seleccione Producto </option>
                @foreach($listaproductos as $prod)
                <option value="{{ $prod->codigo_producto }}|{{ $prod->valor_unitario }}">{{ $prod->nombre_producto }}</option>
                @endforeach
            </select>  
        </div>
        <div class="col-xs-12 col-md-2"><input type="number" min="0" id="cantidad" name="cantidad" placeholder="0" /></div>
        <div class="col-xs-12 col-md-2"><input type="number" id="unitario" name="unitario" disabled /></div>
        <div class="col-xs-12 col-md-3"><input type="number" id="subtotal" name="subtotal" disabled /></div>
    </div>
</div>
    
<div class="vendeoferta">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <select class="form-control" id="lista-oferta" name="lista-oferta" onchange="buscarProductos()">
                @foreach($ofertas as $ofe)
                     <option value="{{ $ofe->codigo_oferta }}">{{ $ofe->nombre_oferta }}</option>
                @endforeach()
            </select>  
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5">Producto</div>
        <div class="col-xs-12 col-md-2">Cantidad</div>
        <div class="col-xs-12 col-md-2">V.Unitario</div>
        <div class="col-xs-12 col-md-3">Total</div>
    </div>
    @foreach($prodofertas as $prof)
        @if ($prof->codigo_oferta == 'of06')
        <div class="row">
            <div class="col-xs-12 col-md-5"><input type="text" id="producto-oferta" name="producto-oferta" value="{{ $prof->codigo_producto }}" /></div>
            <div class="col-xs-12 col-md-2"><input type="number" min="0" id="cantidadofer" name="cantidadofer" placeholder="0" /></div>
            <div class="col-xs-12 col-md-2"><input type="number" id="unitarioofer" name="unitarioofer" disabled /></div>
            <div class="col-xs-12 col-md-3"><input type="number" id="subtotalofer" name="subtotalofer" disabled /></div>
        </div>
        @endif
    @endforeach
</div>      
    
<div class="row" style="height:60px;">&nbsp;</div>
<div class="row">
    <div class="col-md-10">&nbsp;</div>
    <div class="col-md-2 text-right"><button  type="submit" class="btn btn-primary">Guardar</button></div>
</div>
</form>


<script>
    $('input[type=radio]').on('click',function(){
        var valor = $(this).val();
        if (valor == 1){
            $('.vendeoferta').css("display","none");
            $('.vendeproducto').css("display","block");
        }
        if (valor == 2){
            $('.vendeoferta').css("display","block");
            $('.vendeproducto').css("display","none");
        }
    });
    $('select#lista-producto').on('change',function(){
        var valor = $(this).val();
        var explo = valor.split('|');
        var codigo = explo[0];
        var precio = explo[1];
        $('#unitario').val(precio);
        $('#subtotal').val('');
    });
    $('#cantidad').on('blur',function(){
        var precio = $('#unitario').val();
        var cantid = $('#cantidad').val();
        var total = parseInt(cantid)*parseInt(precio);
        $('#subtotal').val(total);
    });
    var mioferta =$('select#lista-oferta').on('change',function(){
        var valor = $(this).val();
        alert(valor);
    });
</script>
<script>
function buscarProductos(){
    var codigo = $('#lista-oferta').val($('#lista-oferta option:selected').val());
    alert(codigo);
    /*
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

    $(cell2)*/
}

</script>

@include('layouts.footer')

@yield('footer')
