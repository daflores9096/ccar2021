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
        <div class="text-left">
            <h4><strong>COMPRA NRO: <?php echo $compra->cod_fac ?></strong></h4>
        </div>
        <div class="text-right">
            <a href="">Editar</a> <a href="">Imprimir</a>
        </div>

    </div>
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
                    <label class="form-label" for="unid_item">Proveedor:</label>
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
                        <tr>
                            <th>Codigo</th>
                            <th class="text-right">Cantidad</th>
                            <th class="text-right">P. Compra</th>
                            <th class="text-right">P. Venta</th>
                            <th class="text-right">Sub Total</th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($compraList as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['cod_item']; ?></td>
                                <td class="text-right"><?php echo $row['cant_fac']; ?></td>
                                <td class="text-right"><?php echo $row['precio_uni']; ?></td>
                                <td class="text-right"><?php echo $row['precio_ven']; ?></td>
                                <td class="text-right"><?php echo $row['importe_fac']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tfoot>
                        <tr>
                            <td class="text-left" colspan="4"><strong>Total Compra: </strong></td>
                            <td class="text-right"><strong><?php echo $compra->total_fac ?></strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

<!--            <div class="row mt-3">-->
<!--                <div class="col-md-6 form-group">-->
<!--                    <label class="form-label" for="caja_item">Total Compra:</label>-->
<!--                    <input class="form-control" type="text" id="total_fac" name="total_fac" value="--><?php //echo $compra->total_fac ?><!--">-->
<!--                </div>-->
<!--            </div>-->

            <div class="text-center mt-3">
                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
                <a class="btn btn-danger" onclick="history.back()" >Cancelar</a>
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
</script>
