<style>
    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-left{
        text-align: left;
    }
</style>

<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 text-left" >
                <h4><strong>NOTA DE VENTA NRO: <?php echo $venta->cod_fac ?></strong></h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="./?controller=ventas&action=print_nota&cod_fac=<?php echo $venta->cod_fac ?>" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Nota Venta</a>
            </div>
        </div>



    </div>
    <div class="card-body">

        <form action="" method="post" id="crearCompra" name="crearCompra">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Nro. Venta:</label>
                    <input class="form-control" type="text" id="cod_fac" name="cod_fac" disabled value="<?php echo $venta->cod_fac ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Fecha:</label>
                    <input class="form-control" type="text" id="fecha_fac" name="fecha_fac" disabled value="<?php echo $venta->fecha_fac ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">ID Cliente:</label>
                    <input class="form-control" type="text" id="cod_cli" name="cod_cli" disabled value="<?php echo $venta->cod_cli ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Nombre cliente:</label>
                    <input class="form-control" type="text" id="nom_cli" name="nom_cli" disabled value="<?php echo $venta->nom_cli ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="container">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Detalle</th>
                            <th class="text-right">Bultos</th>
                            <th class="text-right">Cantidad</th>
                            <th class="text-right">Costo U.</th>
                            <th class="text-right">Importe</th>
                        </tr>
                        </thead>
                        <?php
                        echo "<br>";
                        foreach ($ventaList as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['cod_item']; ?></td>
                                <td><?php echo $row['producto']; ?></td>
                                <td class="text-right"><?php echo $row['bultos']; ?></td>
                                <td class="text-right"><?php echo $row['cant_fac']; ?></td>
                                <td class="text-right"><?php echo $row['precio_uni']; ?></td>
                                <td class="text-right"><?php echo $row['importe_fac']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tfoot>
                        <tr style="background-color: #E9ECEF">
                            <td class="text-left">&nbsp;</td>
                            <td class="text-right"><strong>Total Bultos: </strong></td>
                            <td class="text-right"><strong><?php echo $venta->tot_bul ?></strong></td>
                            <td class="text-left">&nbsp;</td>
                            <td class="text-right"><strong>Total Venta: </strong></td>
                            <td class="text-right"><strong><?php echo $venta->total_fac ?></strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="text-center mt-3">
                <!--                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">-->
                <a class="btn btn-danger" onclick="history.back()" >Volver</a>
            </div>

        </form>
    </div>

</div>

<script>
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
    });

    function sendData(parameters, method='post') {

        const form = document.createElement('form');
        form.method = method;
        form.action = './?controller=ventas&action=crear';
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
</script>
