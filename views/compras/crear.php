<?php
//var_dump($proveedorList);
//var_dump($lastId);
if (!isset($_REQUEST['cod_fac'])){
    $cod_fac = $lastId + 1;
    $cod_pro = "";
    $nom_pro = "";
} else {
    $cod_fac = $_REQUEST['cod_fac'];
    $cod_pro = $_REQUEST['cod_pro'];
    $nom_pro = $_REQUEST['nom_pro'];
}

if (!isset($_REQUEST['fecha_fac'])){
    $fecha_fac = date("Y-m-d");
} else {
    $fecha_fac = $_REQUEST['fecha_fac'];
}

?>
<div class="card mt-5">
    <div class="card-header">
        <h4><strong>AGREGAR NUEVA COMPRA</strong></h4>
    </div>
    <div class="card-body">

        <form action="" method="post" id="crearCompra" name="crearCompra">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Nro. Compra <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="cod_fac" name="cod_fac" required value="<?php echo $cod_fac ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Fecha <span style="color: red">(*):</label>
                    <input class="form-control" type="text" id="fecha_fac" name="fecha_fac" required value="<?php echo $fecha_fac; ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="select_pro">Proveedor:</label>
                    <br>
                    <select class="chosen-select" id="select_pro" name="select_pro" data-placeholder="Seleccione un Proveedor" required="true">
                        <option value=""></option>
                        <?php 
                        foreach ($proveedorList as $row){
                        ?>
                            <option value="<?php echo $row->cod_pro ?>"><?php echo $row->nom_pro ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input type="text" id="cod_pro" name="cod_pro" value="<?php echo $cod_pro ?>">
                    <input type="text" id="nom_pro" name="nom_pro" value="<?php echo $nom_pro ?>">
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="select_pro">Agregar Producto:</label>
                    <br>
                    <select class="chosen-select" id="select_item" name="select_item" data-placeholder="Seleccione un Producto" required="true">
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
                    <input type="text" name="cod_item" id="cod_item">
                    <input type="text" name="nom_item" id="nom_item">
                    <input type="text" name="cant_item" id="cant_item">
                    <input type="text" name="precio_uni" id="precio_uni">
                    <input type="text" name="precio_ven" id="precio_ven">
                    <input type="text" name="importe_fac" id="importe_fac">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="caja_item">Total Compra:</label>
                    <input class="form-control" type="text" id="total_fac" name="total_fac" placeholder="Total en Bolivianos">
                </div>
            </div>

            <div class="text-center mt-3">
                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
                <a class="btn btn-danger" onclick="history.back()" >Cancelar</a>
            </div>

        </form>
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

        //seleccionar Proveedor
        $("#select_pro").chosen({no_results_text:'No hay resultados para '});
        $('#select_pro').on('change', function(evt, params) {
            let valueSelected = params.selected;
            let textSelected = $("#select_pro").find(":selected").text();
            $("#cod_pro").val(valueSelected);
            $("#nom_pro").val(textSelected);
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
</script>
