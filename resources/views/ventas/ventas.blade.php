@include('layouts.header')

@yield('header')

<form>
<div class="row">
    <div class="col-xs-12 col-md-4">Producto</div>
    <div class="col-xs-12 col-md-2">Cantidad</div>
    <div class="col-xs-12 col-md-2">V.Unitario</div>
    <div class="col-xs-12 col-md-3">Total</div>
    <div class="col-xs-12 col-md-1"></div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <select class="form-control" id="lista-producto" name="lista-producto">
            <option value=""> Seleccione Producto </option>
            @foreach($listaproductos as $prod)
            <option value="{{ $prod->codigo_producto }}">{{ $prod->nombre_producto }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-12 col-md-2"><input type="number" min="0" id="cantidad" name="cantidad" placeholder="0" /></div>
    <div class="col-xs-12 col-md-2"><input type="number" id="unitario" name="unitario" disabled /></div>
    <div class="col-xs-12 col-md-3"><input type="number" id="subtotal" name="subtotal" disabled /></div>
    <div class="col-xs-12 col-md-1">
        <i class="fas fa-plus-circle"></i>
        <i class="fas fa-minus-circle"></i>
    </div>
</div>
<div class="row" style="height:60px;">&nbsp;</div>
<div class="row">
    <div class="col-md-10">&nbsp;</div>
    <div class="col-md-2 text-right"><button  type="submit" class="btn btn-primary">Guardar</button></div>
</div>
</form>

@include('layouts.footer')

@yield('footer')
