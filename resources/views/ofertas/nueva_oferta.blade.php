<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
                    var cell5 = row.insertCell(4);
                    
                    // Agrega el contenido a la tabla:
                                        
                    cell1.innerHTML='<button type="button" class="btn btn-danger"  onclick='+"'"+'document.getElementById(' + '"'+ tableid + '"' + ').deleteRow(this.parentNode.parentNode.rowIndex)'+"'>"+ '<i class="fas fa-minus-circle"></i></button>';
                    cell2.style.display="none";
                    cell2.innerHTML = "texto";        
                    cell3.innerHTML = document.getElementById('txProducto').value;
                    cell4.innerHTML = document.getElementById('txCantidad').value;
                    cell5.innerHTML = document.getElementById('txDescuento').value;
                    
                    
                }
        </script>

</head>

<body>

    <div class="container-fluid">
        <form action="" method="">
            <div id="nueva_oferta" style="display:block;">
                <h1>Datos Oferta</h1>
                <div class="row">
                    <div class="col-md-3">
                        <label>Nombre Oferta</label>
                        <input type="text" class="form-control" id="txNombreOferta" name="txNombreOferta">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha inicio</label>
                        <input type="date" class="form-control" id="txNombreOferta" name="txNombreOferta">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Termino</label>
                        <input type="date" class="form-control" id="txNombreOferta" name="txNombreOferta">
                    </div>
                </div>
                <br>
                <h1>Detalle Oferta</h1>
                <hr>

                <div class="btn btn-primary" onclick="document.getElementById('oferta_personalizada').style.display='block';document.getElementById('oferta_criterio').style.display='none'">Oferta personaliza</div>
                <div class="btn btn-primary" onclick="document.getElementById('oferta_criterio').style.display='block';document.getElementById('oferta_personalizada').style.display='none'">Oferta por criterio</div>

                <div class="row">
                    <div class="col-md-3" id="oferta_personalizada" style="display:block;">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Familia</label>
                                <select class="form-control" placeholder="Escriba el nombre del producto" id="txFamilia" name="txFamilia">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Producto</label>
                                <input type="text" class="form-control" placeholder="Escriba el nombre del producto" id="txProducto" name="txProducto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Descuento</label>
                                <input type="number" class="form-control" id="txDescuento" name="txDescuento" min='1' max='90'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Cantidad</label>
                                <input type="number" class="form-control" id="txCantidad" name="txCantidad" min="1">
                            </div>
                            <div class"col-md-2">
                                <button type="button" class="btn btn-success" style="position: relative;top: 30px;width:60px;height:40px;" onclick="agregarProducto('tblOferta');">
                                    <i class="fas fa-plus-circle" style="font-size:25px"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" id="oferta_criterio" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Familia</label>
                                <select class="form-control" placeholder="Escriba el nombre del producto" id="txFamilia_criterio" name="txFamilia_criterio">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Criterio</label>
                                <select class="form-control" placeholder="Escriba el nombre del producto" id="txCriterio" name="txCriterio">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success" style="position: relative;top: 30px">Agregar <i class="fas fa-plus-circle" style="font-size:25px"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        @csr
                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Guardar Oferta</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <table id="tblOferta" class="table">
                                    <thead>
                                        <th>Eliminar</th>
                                        <th style="display:none;">codigo producto</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>descuento</th>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
