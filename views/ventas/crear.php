<?php
//var_dump($productList);
if (isset($ventaList)){
    $cont = count($ventaList);
}

if (!isset($_REQUEST['cod_fac'])){
    $cod_fac = $lastId + 1;
    $cod_cli = "";
    $nom_cli = "";
    $dire_cli = "";
    $traspaso = "";
    $total_venta = 0;
    $tot_bul = 0;
} else {
    $cod_fac = $venta->cod_fac;
    $cod_cli = $venta->cod_cli;
    $nom_cli = $venta->nom_cli;
    $dire_cli = $venta->dire_cli;
    $traspaso = $venta->traspaso;
    $total_venta = $venta->total_fac;
    $tot_bul = $venta->tot_bul;

}

if (!isset($venta->fecha_fac)){
    $fecha_fac = date("Y-m-d");
} else {
    $fecha_fac = $venta->fecha_fac;
}

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
                        <input class="form-control" type="text" id="cod_fac" name="cod_fac" required readonly value="<?php echo $cod_fac ?>">
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
                        <input type="text" id="cod_cli" name="cod_cli" value="<?php echo $cod_cli ?>" required readonly style="background-color: #E9ECEF">
                        <input type="text" id="nom_cli" name="nom_cli" value="<?php echo $nom_cli ?>" required readonly style="background-color: #E9ECEF">
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 form-group">
                            <label class="form-label" for="cod_item">Dirección Cliente:</label>
                            <input class="form-control" type="text" id="dire_cli" name="dire_cli" value="<?php echo $dire_cli ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label" for="traspaso">Traspaso:</label>
                            <input class="form-control" type="text" id="traspaso" name="traspaso" value="<?php echo $traspaso; ?>">
                        </div>
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
                                <option value="<?php echo $row->codigo ?>" data-precio="<?php echo $row->precio; ?>"><?php echo $row->codigo.' - '.$row->producto ?></option>
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
                                <th>Precio Venta</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="cod_item" id="cod_item" readonly style="background-color: #E9ECEF"></td>
                                <td><input type="text" name="nom_item" id="nom_item" size="45" readonly style="background-color: #E9ECEF"></td>
                                <td><input type="text" name="precio_uni" id="precio_uni" value="0" size="10" readonly style="background-color: #E9ECEF"></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <?php
                if (isset($ventaList)) {
                    ?>
                    <div class="row mt-3">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <!--                        <th>ID</th>-->
                                <th>Codigo</th>
                                <th>Artículo</th>
                                <th class="text-right" style="width: 20px">C. Caja</th>
                                <th class="text-right" style="width: 20px">T. Bultos</th>
                                <th class="text-right" style="width: 20px">Cantidad</th>
                                <th class="text-right" style="width: 20px">P. Costo</th>
                                <th class="text-right" style="width: 20px">P. Venta</th>
                                <th class="text-right" style="width: 20px">Importe</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <?php
                            echo "<br>";
                            $indice = 0;
                            $cantidad = count($ventaList);
                            //var_dump($ventaList);
                            foreach ($ventaList as $row){
                                $precio_c = $row['precio_uni'] * 1.40;
                                ?>
                                <tr>
                                    <input type="hidden" name="id<?php echo $indice ?>" value="<?php echo $row['id']; ?>">
                                    <td><?php echo $row['cod_item']; ?><input type="hidden" name="cod_item<?php echo $indice ?>" value="<?php echo $row['cod_item']; ?>"></td>
                                    <td><?php echo $row['producto']; ?><input type="hidden" name="nom_item<?php echo $indice ?>" value="<?php echo $row['producto']; ?>"></td>
                                    <td class="text-right""><input type="text" size="10" id="ccaja<?php echo $indice ?>" name="ccaja<?php echo $indice ?>" readonly value="<?php echo $row['ccaja']; ?>" style="text-align: right; background-color: #E9ECEF"></td>
                                    <td class="text-right""><input type="text" size="10" id="bultos<?php echo $indice ?>" name="bultos<?php echo $indice ?>" readonly value="<?php echo $row['bultos']; ?>" style="text-align: right; background-color: #E9ECEF"></td>
                                    <td class="text-right"><input type="text" size="10" id="cant_fac<?php echo $indice ?>" name="cant_fac<?php echo $indice ?>"  value="<?php echo $row['cant_fac']; ?>" style="text-align: right" onchange="calcBultos(<?php echo $indice; ?>); subtotal(<?php echo $indice; ?>); sumarTotalCompra(<?php echo $cantidad; ?>); sumarTotalBultos(<?php echo $cantidad; ?>)"></td>
                                    <td class="text-right"><input type="text" size="10" id="precio_ven<?php echo $indice ?>" name="precio_ven<?php echo $indice ?>" readonly value="<?php echo $precio_c; ?>" style="text-align: right; background-color: #E9ECEF"></td>
                                    <td class="text-right"><input type="text" size="10" id="precio_uni<?php echo $indice ?>" name="precio_uni<?php echo $indice ?>" readonly value="<?php echo $row['precio_uni']; ?>" style="text-align: right; background-color: #E9ECEF"></td>
                                    <td class="text-right"><input type="text" size="10" id="importe_fac<?php echo $indice ?>" name="importe_fac<?php echo $indice ?>" readonly value="<?php echo $row['importe_fac']; ?>" style="text-align: right; background-color: #E9ECEF"></td>
                                    <td><a href="javascript:void(0)" onclick="eliminarItem(<?php echo $row['id'] ?>,<?php echo $cod_fac ?>,<?php echo $tot_bul ?>,<?php echo $total_venta ?>); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>

                                <?php
                                $indice++;
                            }
                            echo 'Cantidad de items: '.$indice;
                            ?>

                            <input type="hidden" name="cont" value="<?php echo $indice; ?>">
                            <tfoot>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td class="text-left"><strong>Total Bultos: </strong></td>
                                <td class="text-right"><input class="form-control" type="text" id="tot_bul" name="tot_bul" value="<?php echo $tot_bul; ?>"></td>
                                <td colspan="2">&nbsp;</td>
                                <td class="text-left"><strong>Total Compra: </strong></td>
                                <td class="text-right"><input class="form-control" type="text" id="total_fac" name="total_fac" value="<?php echo $total_venta; ?>"></td>
                                <input type="hidden" id="edit" name="edit" value="1">
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                } else {
                    $indice = 0;
                ?>
                    <input type="hidden" name="cont" value="<?php echo $indice; ?>">
                    <input type="hidden" id="tot_bul" name="tot_bul" value="<?php echo $tot_bul; ?>">
                    <input type="hidden" id="total_fac" name="total_fac" value="<?php echo $total_venta; ?>">
                    <input type="hidden" id="edit" name="edit" value="0">

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

    function calcBultos(x){
        let cant = $("#cant_fac"+x).val();
        let ccaja = $("#ccaja"+x).val();
        let t_bultos =  cant / ccaja;
        $("#bultos"+x).val(t_bultos.toFixed(2));
    }

    function subtotal(x){

        let indice = "#cant_fac"+x;
        let precio_uni = parseFloat($("#precio_uni"+x).val());
        let cant = $("#cant_fac"+x).val();


        console.log('indice: ' + indice);
        console.log('precio uni: ' + precio_uni);
        console.log('cantidad: ' + cant);
        let importe = parseFloat($("#cant_fac"+x).val() * $("#precio_uni"+x).val());
        $("#importe_fac"+x).val(importe.toFixed(2));
    }

    function sumarTotalBultos(x){
        let total = 0;

        for (i=0;i<x;i++){
            subtot = $("#bultos"+i).val();
            total = total + parseFloat(subtot);
            //console.log('cantidad items: ' + x);
            //console.log('total: ' + subtot + ' - ' + total);
        }
        $("#tot_bul").val(total);
    }

    function sumarTotalCompra(x){
        let total = 0;

        for (i=0;i<x;i++){
            subtot = $("#importe_fac"+i).val();
            total = total + parseFloat(subtot);
            //console.log('cantidad items: ' + x);
            //console.log('total: ' + subtot + ' - ' + total);
        }
        $("#total_fac").val(total);

    }

    function eliminarItem(id, cod_fac, tot_bul, total_venta){
        swal("¿Está seguro que desea eliminar el Item "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=ventas&action=borrarItem&id='+id+'&cod_fac='+cod_fac+'&tot_bul='+tot_bul+'&total_venta='+total_venta;
                        //sendData('./?controller=ventas&action=crear', {cod_fac: cod_fac});
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
        esperar(100);

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
