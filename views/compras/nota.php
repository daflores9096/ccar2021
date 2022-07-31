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
//var_dump($compraList);
?>
<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">NOTA DE COMPRA NRO: <?php echo $compra->cod_fac ?></h2>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 10px">
        <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;<a href="./?controller=compras&action=print_nota&cod_fac=<?php echo $compra->cod_fac ?>" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Nota Compra</a>
    </div>
</div>
<br>
<div class="card mt-5">
<!--    <div class="card-header">-->
<!--        <div class="row">-->
<!--            <div class="col-md-6 text-left">-->
<!--                <h4><strong>NOTA DE COMPRA NRO: --><?php //echo $compra->cod_fac ?><!--</strong></h4>-->
<!--            </div>-->
<!--            <div class="col-md-6 text-right">-->
<!--                <a href="./?controller=compras&action=print_nota&cod_fac=--><?php //echo $compra->cod_fac ?><!--" target="_blank" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Imprimir Nota Compra</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="card-body">

        <form action="" method="post" id="crearCompra" name="crearCompra">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Nro. Compra:</label>
                    <input class="form-control" type="text" id="cod_fac" name="cod_fac" disabled value="<?php echo $compra->cod_fac ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Fecha:</label>
                    <input class="form-control" type="text" id="fecha_fac" name="fecha_fac" disabled value="<?php echo $compra->fecha_fac ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">ID Proveedor:</label>
                    <input class="form-control" type="text" id="cod_pro" name="cod_pro" disabled value="<?php echo $compra->cod_pro ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Nombre Proveedor:</label>
                    <input class="form-control" type="text" id="nom_pro" name="nom_pro" disabled value="<?php echo $compra->nom_pro ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="container">
                    <table class="table">
                        <thead class="table-light">
                        <tr style="background-color: #ededef">
                            <th>Codigo</th>
                            <th>Artículo</th>
                            <th>Unidad</th>
                            <th class="text-right">Cantidad</th>
                            <th class="text-right">P. Compra</th>
                            <th class="text-right">P. Venta</th>
                            <th class="text-right">Sub Total</th>
                        </tr>
                        </thead>
                        <?php
                        echo "<br>";
                        foreach ($compraList as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['cod_item']; ?></td>
                                <td><?php echo $row['nom_item']; ?></td>
                                <td><?php echo $row['unid_item']; ?></td>
                                <td class="text-right"><?php echo $row['cant_fac']; ?></td>
                                <td class="text-right"><?php echo $row['precio_uni']; ?></td>
                                <td class="text-right"><?php echo $row['precio_ven']; ?></td>
                                <td class="text-right"><?php echo $row['importe_fac']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tfoot>
                        <tr style="background-color: #E9ECEF">
                            <td class="text-left" colspan="6"><strong>Total Compra: </strong></td>
                            <td class="text-right"><strong><?php echo $compra->total_fac ?></strong></td>
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
        form.action = './?controller=compras&action=crear';
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
