<?php
//var_dump($proveedorList);
//var_dump($lastId);

//var_dump($_POST);
if (isset($ventaList)){

    $cont = count($ventaList);
    //echo "<br>compraList (".$cont." items ): <br>";
    //var_dump($compraList);
}

if (!isset($_REQUEST['cod_fac'])){
    $cod_fac = $lastId + 1;
    $cod_cli = "";
    $nom_cli = "";
} else {
    $cod_fac = $_REQUEST['cod_fac'];
    $cod_pro = $_REQUEST['cod_cli'];
    $nom_pro = $_REQUEST['nom_cli'];
}

if (!isset($_REQUEST['fecha_fac'])){
    $fecha_fac = date("Y-m-d");
} else {
    $fecha_fac = $_REQUEST['fecha_fac'];
}

$total_compra = 0;
?>
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4><strong>AGREGAR NUEVA VENTA</strong></h4>
        </div>
        <div class="card-body">

            <form action="" method="post" id="crearVenta" name="crearVenta">
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="cod_item">Nro. Venta <span style="color: red">(*)</span>:</label>
                        <input class="form-control" type="text" id="cod_fac" name="cod_fac" required value="<?php echo $cod_fac ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="nom_item">Fecha <span style="color: red">(*):</label>
                        <input class="form-control" type="text" id="fecha_fac" name="fecha_fac" required value="<?php echo $fecha_fac; ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="select_pro">Cliente:</label>
                        <br>
                        <select class="chosen-select" id="select_cli" name="select_cli" data-placeholder="Seleccione un Cliente">
                            <option value=""></option>
                            <?php
                            foreach ($clienteList as $row){
                                ?>
                                <option value="<?php echo $row->cod_cli ?>"><?php echo $row->nom_cli ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <input type="text" id="cod_cli" name="cod_cli" value="<?php echo $cod_cli ?>" required>
                        <input type="text" id="nom_cli" name="nom_cli" value="<?php echo $nom_cli ?>" required>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="select_pro">Agregar Producto:</label>
                        <br>
                        <select class="chosen-select" id="select_item" name="select_item" data-placeholder="Seleccione un Producto">
                            <option value=""></option>
                            <?php
                            foreach ($productList as $row){
                                ?>
                                <option value="<?php echo $row->codigo ?>" data-precio="<?php echo $row->precio; ?>"><?php echo $row->producto ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="form-group">
                        <table>
                            <tr>
                                <th>Codigo</th>
                                <th>Artículo</th>
                                <th>C. Caja</th>
                                <th>T. Bultos</th>
                                <th>Cantidad</th>
                                <th>Precio Costo</th>
                                <th>Precio Venta</th>
                                <th>Importe</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="cod_item" id="cod_item"></td>
                                <td><input type="text" name="nom_item" id="nom_item" size="45"></td>
                                <td><input type="text" name="cant_item" id="cant_item" value="0" size="5"></td>
                                <td><input type="text" name="cant_item" id="cant_item" value="0" size="5"></td>
                                <td><input type="text" name="cant_item" id="cant_item" value="0" size="10"></td>
                                <td><input type="text" name="precio_uni" id="precio_uni" value="0" size="10"></td>
                                <td><input type="text" name="precio_ven" id="precio_ven" value="0" size="10"></td>
                                <td><input type="text" name="importe_fac" id="importe_fac" value="0" size="10"></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <?php
                if (isset($compraList)) {
                    ?>
                    <div class="row mt-3">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <!--                        <th>ID</th>-->
                                <th>Codigo</th>
                                <th>Detalle</th>
                                <th class="text-right" style="width: 20px">Cantidad</th>
                                <th class="text-right" style="width: 20px">P. Compra</th>
                                <th class="text-right" style="width: 20px">P. Venta</th>
                                <th class="text-right" style="width: 20px">Sub Total</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <?php
                            echo "<br>";
                            $indice = 0;
                            $cantidad = count($compraList);
                            foreach ($compraList as $row){
                                ?>
                                <tr>
                                    <input type="hidden" name="id<?php echo $indice ?>" value="<?php echo $row['id']; ?>">
                                    <td><?php echo $row['cod_item']; ?><input type="hidden" name="cod_item<?php echo $indice ?>" value="<?php echo $row['cod_item']; ?>"></td>
                                    <td><?php echo $row['nom_item']; ?><input type="hidden" name="nom_item<?php echo $indice ?>" value="<?php echo $row['nom_item']; ?>"></td>
                                    <td class="text-right""><input type="text" size="10" id="cant_fac<?php echo $indice ?>" name="cant_fac<?php echo $indice ?>" value="<?php echo $row['cant_fac']; ?>" onchange="subtotal(<?php echo $indice ?>); sumarTotalCompra(<?php echo $cantidad; ?>)"></td>
                                    <td class="text-right"><input type="text" size="10" id="precio_uni<?php echo $indice ?>" name="precio_uni<?php echo $indice ?>" readonly value="<?php echo $row['precio_uni']; ?>"></td>
                                    <td class="text-right"><input type="text" size="10" id="precio_ven<?php echo $indice ?>" name="precio_ven<?php echo $indice ?>" readonly value="<?php echo $row['precio_ven']; ?>"></td>
                                    <td class="text-right"><input type="text" size="10" id="importe_fac<?php echo $indice ?>" name="importe_fac<?php echo $indice ?>" readonly value="<?php echo $row['importe_fac']; ?>"></td>
                                    <td><a href="javascript:void(0)" onclick="eliminarItem(<?php echo $row['id'] ?>,<?php echo $cod_fac ?>,<?php echo $cod_pro ?>,'<?php echo $nom_pro ?>','<?php echo $fecha_fac ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>

                                <?php
                                $total_compra = $total_compra + $row['importe_fac'];
                                $indice++;
                            }
                            echo 'Cantidad de items: '.$indice;
                            ?>

                            <input type="hidden" name="cont" value="<?php echo $cont; ?>">
                            <tfoot>
                            <tr>
                                <td class="text-left" colspan="5"><strong>Total Compra: </strong></td>
                                <td class="text-right"><input class="form-control" type="text" id="total_fac" name="total_fac" value="<?php echo $total_compra; ?>"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                ?>

                <div class="text-center mt-3">
                    <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
                    <a class="btn btn-danger" href="?controller=ventas&action=lista" >Cancelar</a>
                </div>

            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#fecha_fac").datepicker({
            dateFormat: "yy-mm-dd"
        });

        $("#crearProd").validate({
            messages : {
                cod_fac: {
                    required: "Ingrese el Nro. Factura"
                },
                fecha_fac: {
                    required: "Ingrese la fecha"
                }
            }
        });

        //seleccionar Cliente
        $("#select_cli").chosen({no_results_text:'No hay resultados para '});
        $('#select_cli').on('change', function(evt, params) {
            let valueSelected = params.selected;
            let textSelected = $("#select_cli").find(":selected").text();
            $("#cod_cli").val(valueSelected);
            $("#nom_cli").val(textSelected);
        });

        //seleccionar Producto
        $("#select_item").chosen({no_results_text:'No hay resultados para '});
        $('#select_item').on('change', function(evt, params) {
            let valueSelected = params.selected;
            let textSelected = $("#select_item").find(":selected").text();

            var selected = $(this).find('option:selected');
            var dataSelected = selected.data('precio');

            $("#cod_item").val(valueSelected);
            $("#nom_item").val(textSelected);
            $("#precio_uni").val(dataSelected);

        });

    });

    function subtotal(x){

        let add_porcent = parseFloat($("#precio_uni"+x).val() * 0.40);
        let precio_ven = parseFloat($("#precio_uni"+x).val()) + add_porcent;
        //console.log('porcentaje: ' + add_porcent);
        //console.log('precio venta: ' + precio_ven);
        $("#precio_ven"+x).val(precio_ven.toFixed(2));
        let imp = $("#cant_fac"+x).val() * precio_ven;


        $("#importe_fac"+x).val(imp.toFixed(2));
    }

    function sumarTotalCompra(x){
        let total = 0;


        for (i=0;i<x;i++){
            subtot = $("#importe_fac"+i).val();
            total = total + parseFloat(subtot);
            console.log('cantidad items: ' + x);
            console.log('total: ' + subtot + ' - ' + total);
        }
        $("#total_fac").val(total);

    }

    function eliminarItem(id, cod_fac, cod_cli, nom_cli, fecha_fac){
        swal("¿Está seguro que desea eliminar el Item "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=ventas&action=borrarItem&id='+id;
                        //sendData('./?controller=compras&action=borrarItem',{id:id});
                        sendData('./?controller=ventas&action=crear', {cod_fac: cod_fac, cod_pro: cod_cli, nom_cli: ''+nom_cli+'', fecha_fac: ''+fecha_fac+'' });
                        break;

                    default:
                        return false;
                }
            });
    }

    function sendData(path, parameters, method='post') {

        const form = document.createElement('form');
        form.method = method;
        form.action = path;
        document.body.appendChild(form);
        //alert('formulario creado...');
        esperar(250);

        for (const key in parameters) {
            const formField = document.createElement('input');
            formField.type = 'hidden';
            formField.name = key;
            formField.value = parameters[key];

            form.appendChild(formField);
        }
        form.submit();
    }

    function esperar(ms){
        var start = new Date().getTime();
        var end = start;
        while(end < start + ms) {
            end = new Date().getTime();
        }
    }

</script>
