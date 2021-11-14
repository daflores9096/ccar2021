<div class="card mt-5">
    <div class="card-header">
        <h4><strong>AGREGAR NUEVA COMPRA</strong></h4>
    </div>
    <div class="card-body">

        <form action="" method="post" id="crearCompra" name="crearCompra">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Nro. Compra <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="cod_fac" name="cod_fac" required placeholder="Ingrese el numero de compra">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Fecha <span style="color: red">(*):</label>
                    <input class="form-control" type="text" id="fecha_fac" name="fecha_fac" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Proveedor:</label>
                    <input class="form-control" type="text" id="cod_pro" name="cod_pro" placeholder="Codigo Proveedor">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Nombre Proveedor:</label>
                    <input class="form-control" type="text" id="nom_pro" name="nom_pro" placeholder="Nombre Proveedor">
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
