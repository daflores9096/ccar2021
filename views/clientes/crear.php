<div class="card mt-5">
    <div class="card-header">
        <h4><strong>AGREGAR NUEVO CLIENTE</strong></h4>
    </div>
    <div class="card-body">

        <form action="" method="post" id="crearCli" name="crearCli">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Código Cliente <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="cod_cli" name="cod_cli" required placeholder="Ingrese el código del Cliente">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Nombre Cliente<span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="nom_cli" name="nom_cli" required placeholder="Ingrese el nombre del Cliente">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Contacto Secundario:</label>
                    <input class="form-control" type="text" id="contacto_sec" name="contacto_sec" placeholder="Ingrese el Contacto Secundario">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Dirección Principal:</label>
                    <input class="form-control" type="text" id="dire_cli" name="dire_cli" placeholder="Ingrese la Dirección">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="caja_item">Dirección Secundaria:</label>
                    <input class="form-control" type="text" id="dire_sec" name="dire_sec" placeholder="Ingrese la dirección secundaria">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="existencia">Ciudad:</label>
                    <input class="form-control" type="text" id="ciudad_cli" name="ciudad_cli" placeholder="Ingrese la ciudad">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Teléfono Principal:</label>
                    <input class="form-control" type="text" id="tel_cli" name="tel_cli" placeholder="Ingrese el teléfono principal">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_min">Teléfono Secundario:</label>
                    <input class="form-control" type="text" id="tel_sec" name="tel_sec" placeholder="Ingrese el teléfono secundario">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Correo Electrónico:</label>
                    <input class="form-control" type="text" id="email_cli" name="email_cli" placeholder="Ingrese el correo electrónico">
                </div>
                <div class="col-md-6 form-group">
                    &nbsp;
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label for="deta_item">Descripción:</label>
                    <textarea class="form-control" name="desc_cli" id="desc_cli" rows="3"></textarea>
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
        $("#crearCli").validate({
            messages : {
                cod_item: {
                    required: "Ingrese el Código"
                },
                nom_item: {
                    required: "Ingrese el nombre del Cliente"
                }
            }
        });
    });
</script>