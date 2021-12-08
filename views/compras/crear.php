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
                    <label class="form-label" for="select_pro">Proveedor:</label>
                    <br>
                    <select class="chosen-select" id="select_pro" name="select_pro">
                        <option value="1">DEEPAK INTERNATIONAL</option>
                        <option value="2">ANHUI GENSUM</option>
                        <option value="3">FINE FINE</option>
                        <option value="4">QINGDAO LEAGLE</option>
                        <option value="5">KENLIGHT TRADING</option>
                        <option value="7">QINGDAO HUANGHAIWANG</option>
                        <option value="8">KENDA MOTO</option>
                        <option value="10">PANANDINO</option>
                        <option value="11">SEASTONE</option>
                        <option value="12">RONGER</option>
                    </select>
                    <br>
                    <input type="hidden" id="cod_pro" name="cod_pro">
                    <input type="hidden" id="nom_pro" name="nom_pro">
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

        $(".chosen-select").chosen({no_results_text:'No hay resultados para '});
        $('.chosen-select').on('change', function(evt, params) {
            let chosenSelectedItem = $(".chosen-select").find(":selected").text();
            //console.log("cambiando... " + params.selected + ' ' + chosenSelectedItem);
            $("#nom_pro").val(chosenSelectedItem);
            $("#cod_pro").val(params.selected);

        });

    });
</script>
