@include('layouts.header')

@yield('header')



    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('nueva_familia').style.display='block';document.getElementById('modificar_familia').style.display='none'">Agregar Familia</button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('modificar_familia').style.display='block';document.getElementById('nueva_familia').style.display='none'">Modificar Familia</button>
            </div>            
        </div>
        <br>
        <form action="" method="" id="nueva_familia" style="display:block;">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-5">
                    <labe>Nombre Familia</labe>
                    <input type="text" class="form-control" id="txNueva_familia">
                </div>
                <div class="col-md-1">
                    <br>
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </div>
        </form>
        <form action="" method="" id="modificar_familia" style="display:none;">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-5">
                    <labe>Familia</labe>
                    <select class="form-control" id="txnombre_familia">
                    </select>
                </div>
                <div class="col-md-3">
                    <labe>Nuevo Nombre</labe>
                    <input type="text" class="form-control" id="txNuevo_nombre">
                </div>                
                <div class="col-md-1">
                    <br>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>
            </div>
        </form>        
    </div>
</body>
@include('layouts.footer')

@yield('footer')