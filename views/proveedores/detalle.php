<div class="card mt-5">
    <div class="card-header">
        <h4><strong><?php echo $proveedor->nom_pro ?></strong></h4>
    </div>
    <div class="card-body">

        <form action="./?controller=proveedor&action=editar" method="post" id="crearPro" name="crearPro">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Código Proveedor <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="cod_pro" name="cod_pro" value="<?php echo $proveedor->cod_pro ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Nombre Proveedor<span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="nom_pro" name="nom_pro" required  value="<?php echo $proveedor->nom_pro ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Contacto Secundario:</label>
                    <input class="form-control" type="text" id="contacto_sec" name="contacto_sec"  value="<?php echo $proveedor->contacto_sec ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Dirección Principal:</label>
                    <input class="form-control" type="text" id="dire_pro" name="dire_pro" value="<?php echo $proveedor->dire_pro ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Correo Electrónico:</label>
                    <input class="form-control" type="text" id="email_pro" name="email_pro" value="<?php echo $proveedor->email_pro ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="existencia">Ciudad:</label>
                    <input class="form-control" type="text" id="ciudad_pro" name="ciudad_pro" value="<?php echo $proveedor->ciudad_pro ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Teléfono Principal:</label>
                    <input class="form-control" type="text" id="tel_pro" name="tel_pro" value="<?php echo $proveedor->tel_pro ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_min">Teléfono Secundario:</label>
                    <input class="form-control" type="text" id="tel_sec" name="tel_sec" value="<?php echo $proveedor->tel_sec ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label for="deta_item">Descripción:</label>
                    <textarea class="form-control" name="desc_pro" id="desc_pro" rows="3"> <?php echo $proveedor->desc_pro ?></textarea>
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
        $("#crearPro").validate({
            messages : {
                cod_item: {
                    required: "Ingrese el Código"
                },
                nom_item: {
                    required: "Ingrese el nombre del Proveedor"
                }
            }
        });
    });
</script>
