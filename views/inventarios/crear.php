<?php
//var_dump($_REQUEST);
//var_dump($inventarioList);
//var_dump($productList);

if (isset($_REQUEST['terminar']) && $_REQUEST['terminar'] == 1){
    echo "
    <script>
        $(location).attr('href','./?controller=inventarios&action=lista');
    </script>
    ";
}

if (isset($inventarioList)){
    $cont = count($inventarioList);
}

if (!isset($_REQUEST['id_inv'])){
    $id_inv = $lastId + 1;
    $fecha_lev = "";
    $descripcion = "";
    $fecha_ap = "";
    $estado = "Pendiente";
} else {
    $id_inv = $inventario->id_inv;
    $fecha_lev = $inventario->fecha_lev;
    $descripcion = $inventario->descripcion;
    $fecha_ap = $inventario->fecha_ap;
    $estado = $inventario->estado;
}

if (!isset($inventario->fecha_lev)){
    $fecha_lev = date("Y-m-d");
} else {
    $fecha_lev = $inventario->fecha_lev;
}

?>
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4><strong>AGREGAR NUEVO INVENTARIO</strong></h4>
        </div>
        <div class="card-body">

            <form action="" method="post" id="crearInventario" name="crearInventario">
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="cod_item">ID <span style="color: red">(*)</span>:</label>
                        <input class="form-control" type="text" id="id_inv" name="id_inv" readonly value="<?php echo $id_inv ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="nom_item">Fecha Levantamiento <span style="color: red">(*):</label>
                        <input class="form-control" type="text" id="fecha_lev" name="fecha_lev" readonly value="<?php echo $fecha_lev; ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="descripcion">Descripción:</label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="nom_item">Fecha Aplicación <span style="color: red">(*):</label>
                        <input class="form-control" type="text" id="fecha_ap" name="fecha_ap" readonly value="<?php echo $fecha_ap; ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <label class="form-label" for="estado">Estado:</label>
                        <input class="form-control" type="text" id="estado" name="estado" readonly value="<?php echo $estado; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        &nbsp;
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
                                <option value="<?php echo $row->codigo ?>" data-existencia="<?php echo $row->existencia; ?>"><?php echo $row->producto ?></option>
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
                                <th>Producto</th>
                                <th>Existencia Actual</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="cod_item" id="cod_item" readonly style="background-color: #E9ECEF"></td>
                                <td><input type="text" name="nom_item" id="nom_item" readonly style="background-color: #E9ECEF"></td>
                                <td><input type="text" name="existencia" id="existencia" value="0" readonly style="background-color: #E9ECEF"></td>
                            </tr>
                        </table>

                    </div>
                </div>

                <?php
                if (isset($inventarioList)) {
                    echo "llenando items...";
                    ?>
                    <div class="row mt-3">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <!--                        <th>ID</th>-->
                                <th>Codigo</th>
                                <th>Artículo</th>
                                <th>Unidad</th>
                                <th class="text-right" style="width: 20px">E.Actual</th>
                                <th class="text-right" style="width: 20px">E.Fisica</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <?php
                            echo "<br>";
                            $indice = 0;
                            $cantidad = count($inventarioList);
                            foreach ($inventarioList as $row){
                                ?>
                                <tr>
                                    <input type="hidden" name="id<?php echo $indice ?>" value="<?php echo $row['id']; ?>">
                                    <td><?php echo $row['cod_item']; ?><input type="hidden" name="cod_item<?php echo $indice ?>" value="<?php echo $row['cod_item']; ?>"></td>
                                    <td><?php echo $row['nom_item']; ?></td>
                                    <td><?php echo $row['unid_item']; ?></td>
                                    <td><?php echo $row['existencia']; ?></td>
                                    <td class="text-right"><input type="text" size="10" id="existencia_inv<?php echo $indice ?>" name="existencia_inv<?php echo $indice ?>" value="<?php echo $row['existencia_inv']; ?>"></td>
                                    <input type="hidden" name="existencia_sis<?php echo $indice ?>" value="<?php echo $row['existencia']; ?>">
                                    <input type="hidden" name="diferencia<?php echo $indice ?>" value="<?php echo $row['diferencia']; ?>">
                                    <td><a href="javascript:void(0)" onclick="eliminarItem(<?php echo $row['id'] ?>,<?php echo $row['id_inv'] ?>); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>

                                <?php
                                //$total_compra = $total_compra + $row['importe_fac'];
                                $indice++;
                            }
                            echo 'Cantidad de items: '.$indice;
                            ?>

                            <input type="hidden" name="cont" value="<?php echo $cont; ?>">
                            <input type="hidden" id="edit" name="edit" value="1">
                            <input type="hidden" id="terminar" name="terminar" value="0">
                        </table>
                    </div>
                    <?php
                } else {
                    $indice = 0;
                    ?>
                    <input type="hidden" name="cont" value="<?php echo $indice; ?>">
                    <input type="hidden" id="edit" name="edit" value="0">
                    <input type="hidden" id="terminar" name="terminar" value="0">

                    <?php
                }
                ?>

                <div class="text-center mt-3">
                    <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
                    <input type="button" id="btnGT" name="btnGT" class="btn btn-success"  value="Guardar y Terminar">
                    <a class="btn btn-danger" href="?controller=inventarios&action=lista" >Cancelar</a>
                </div>

            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#fecha_lev").datepicker({
            dateFormat: "yy-mm-dd"
        });

        //seleccionar Producto
        $("#select_item").chosen({no_results_text:'No hay resultados para '});
        $('#select_item').on('change', function(evt, params) {
            let valueSelected = params.selected;
            let textSelected = $("#select_item").find(":selected").text();
            var selected = $(this).find('option:selected');
            var dataSelected = selected.data('existencia');

            $("#cod_item").val(valueSelected);
            $("#nom_item").val(textSelected);
            $("#existencia").val(dataSelected);

        });

        $("#btnGT").click(function() {
            $('#terminar').val(1);
            $('#crearInventario').submit();
        });

    });

    function eliminarItem(id, id_inv){
        swal("¿Está seguro que desea eliminar el Item "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=inventarios&action=borrarItem&id='+id+'&id_inv='+id_inv;
                        break;

                    default:
                        return false;
                }
            });
    }

</script>
