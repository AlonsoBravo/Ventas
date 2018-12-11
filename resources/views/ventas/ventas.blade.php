@include('layouts.header')

@yield('header')
<style>
    #nover{ display: none !important; visibility: hidden !important; color:white; }
    .vendeproducto, .vendeoferta { display: none; }
</style>

<form action="{{ route('guardar_venta') }}" method="post">
{{ csrf_field() }}
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
        <div class="col-xs-12 col-md-2"><input type="number" min="0" id="cantidad" name="cantidad" placeholder="0" class="text-right" /></div>
        <div class="col-xs-12 col-md-2"><input type="number" id="unitario" name="unitario" class="text-right" disabled /></div>
        <div class="col-xs-12 col-md-3"><input type="number" id="subtotal" name="subtotal" class="text-right" disabled /></div>
    </div>
</div>
    
<div class="vendeoferta">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <label>Seleccione Combo</label>
            <select class="form-control" id="lista-oferta" name="lista-oferta">
                <option value=""> Seleccione la Oferta</option>
                @foreach($ofertas as $ofe)
                     <option value="{{ $ofe->codigo_oferta }}">{{ $ofe->nombre_oferta }}</option>
                @endforeach()
            </select>  
        </div>
        <div class="col-xs-12 col-md-2">
            <label>Cantidad</label>
            <input type="number" min="0" id="cantidadof" name="cantidadof" placeholder="0" class="text-right"  style="width:100%;" />
        </div>
        <div class="col-xs-12 col-md-2">
            <label>Precio Combo</label>
            <input type="number" id="unitarioof" name="unitarioof" class="text-right" disabled />
        </div>
        <div class="col-xs-12 col-md-2">
            <label>Subtotal</label>
            <input type="number" id="subtotalof" name="subtotalof" class="text-right" disabled />
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="mitabla">
        
        </div>
    </div>
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
    $('#cantidadof').on('blur',function(){
        var precio = $('#valorfinal').val();
        $('#unitarioof').val(precio);
        var cantid = $('#cantidadof').val();
        var total = parseInt(cantid)*parseInt(precio);
        $('#subtotalof').val(total);
    });
    $('#cantidadof').on('blur',function(){
        var max = $('#maximo').val();
        $('#cantidadof').attr({"max":max});
    });
</script>
<script>
$(document).ready(function(){
    $('#lista-oferta').on('change',function(){
        $('#cantidadof').val('0');
        $('#unitarioof').val('0');
        $('#subtotalof').val('0');
        
        var codigo = $('#lista-oferta option:selected').val()
        var parametros = {
            'idoferta':codigo
        }
        $.ajax({
            data:parametros,
            url:"{{route('detoferta')}}",
            type:"GET",
            success:function(response){
                $('.mitabla').html(response);
            }
        });
    });
});
</script>

@include('layouts.footer')

@yield('footer')
