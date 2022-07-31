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
//var_dump($inventarioList);
?>
<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">INVENTARIO NRO: <?php echo $inventario->id_inv ?></h2>
    </div>
    <?php
    if ($inventario->estado == "Aplicado"){
    ?>
        <div class="col-md-6 text-right" style="padding-top: 10px">
            <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>
        </div>
    <?php
    } else {
    ?>
        <div class="col-md-6 text-right" style="padding-top: 10px">
            <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;<a href="./?controller=inventarios&action=crear&id_inv=<?php echo $inventario->id_inv ?>&ed=1" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a> <a href="./?controller=inventarios&action=aplicar&id_inv=<?php echo $inventario->id_inv ?>" class="btn btn-primary"><i class="fas fa-print"></i> Aplicar Inventario</a>
        </div>
    <?php
    }
    ?>

</div>
<br>
<div class="card mt-5">
<!--    <div class="card-header">-->
<!--        <div class="text-left">-->
<!--            <h4><strong>INVENTARIO NRO: --><?php //echo $inventario->id_inv ?><!--</strong></h4>-->
<!--        </div>-->
<!--        <div class="text-right">-->
<!--            <a href="./?controller=inventarios&action=crear&id_inv=--><?php //echo $inventario->id_inv ?><!--" class="btn btn-primary" style="background-color: steelblue""><i class="fas fa-edit"></i> Editar</a> <a href="./?controller=inventarios&action=aplicar&id_inv=--><?php //echo $inventario->id_inv ?><!--" class="btn btn-primary" style="background-color: steelblue"><i class="fas fa-print"></i> Aplicar Inventario</a>-->
<!--        </div>-->
<!---->
<!--    </div>-->
    <div class="card-body">

        <form action="" method="post" id="detalleInventario" name="detalleInventario">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">ID:</label>
                    <input class="form-control" type="text" id="id_inv" name="cod_fac" disabled value="<?php echo $inventario->id_inv ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Fecha:</label>
                    <input class="form-control" type="text" id="fecha_lev" name="fecha_lev" disabled value="<?php echo $inventario->fecha_lev ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Descripción:</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" disabled value="<?php echo $inventario->descripcion ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Fecha Aplicada:</label>
                    <input class="form-control" type="text" id="fecha_ap" name="fecha_ap" disabled value="<?php echo $inventario->fecha_ap ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Estado:</label>
                    <input class="form-control" type="text" id="estado" name="estado" disabled value="<?php echo $inventario->estado ?>">
                </div>
                <div class="col-md-6 form-group">
                    &nbsp;
                </div>
            </div>

            <div class="row mt-3">
                <div class="container">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Codigo Prod.</th>
                            <th>Artículo</th>
                            <th>Unidad</th>
                            <th class="text-right">Existencia Física</th>
                        </tr>
                        </thead>
                        <?php
                        echo "<br>";
                        foreach ($inventarioList as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['cod_item']; ?></td>
                                <td><?php echo $row['nom_item']; ?></td>
                                <td><?php echo $row['unid_item']; ?></td>
                                <td class="text-right"><?php echo $row['existencia_inv']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>

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
