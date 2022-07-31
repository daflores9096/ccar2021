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

<?php
//$path = '/?controller=compras&action=crear';
//$params = '{cod_fac:'.$compra->cod_fac.', cod_pro:'. $compra->cod_pro.', nom_pro:'.$compra->nom_pro.', fecha_fac:'.$compra->fecha_fac.' }';
?>
<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">Detalle Venta</h2>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 10px">
        <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;&nbsp;<a href="./?controller=ventas&action=crear&cod_fac=<?php echo $venta->cod_fac ?>&ed=1" class="btn btn-primary" style="background-color: steelblue""><i class="fas fa-edit"></i> Editar</a> <a href="./?controller=ventas&action=print_nota&cod_fac=<?php echo $venta->cod_fac ?>" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Venta</a> <a href="./?controller=ventas&action=print_nota2&cod_fac=<?php echo $venta->cod_fac ?>" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Venta (MOD)</a>
    </div>
</div>
<div class="row" style="background: #F8F8F8; border: 1px solid #ededef">
    <div class="col-md-12 text-left" style="margin-bottom: 10px; margin-top: 10px; font-size: 20px">
        Venta Nro: <?php echo $venta->cod_fac ?>
    </div>
</div>
<br>
<div class="card mt-5">
<!--    <div class="card-header">-->
<!--        <div class="text-left">-->
<!--            <h4><strong>VENTA NRO: --><?php //echo $venta->cod_fac ?><!--</strong></h4>-->
<!--        </div>-->
<!--        <div class="text-right">-->
<!--            <a href="./?controller=ventas&action=crear&cod_fac=--><?php //echo $venta->cod_fac ?><!--" class="btn btn-primary" style="background-color: steelblue""><i class="fas fa-edit"></i> Editar</a> <a href="./?controller=ventas&action=print_nota&cod_fac=--><?php //echo $venta->cod_fac ?><!--" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Venta</a> <a href="./?controller=ventas&action=print_nota2&cod_fac=--><?php //echo $venta->cod_fac ?><!--" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Venta (MOD)</a>-->
<!--        </div>-->
<!---->
<!--    </div>-->
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

<!--            <div class="text-center mt-3">-->
<!--                <a class="btn btn-danger" onclick="history.back()" >Volver</a>-->
<!--            </div>-->

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
