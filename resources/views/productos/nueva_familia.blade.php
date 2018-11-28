<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        
        <h3>Seleccione una opción</h3>
        <br>
        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('nueva_familia').style.display='block';document.getElementById('modificar_familia').style.display='none'">Agregar Familia</button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('modificar_familia').style.display='block';document.getElementById('nueva_familia').style.display='none'">Modificar Familia</button>
            </div>            
        </div>
        <br>
        <form action="" method="" id="nueva_familia" style="display:block;">
            @csrf
            <div class="row">
                <div class="col-md-3">
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
            @csrf
            <div class="row">
                <div class="col-md-3">
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

</html>
