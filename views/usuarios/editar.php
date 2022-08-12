<br>
<div class="row">
    <div class="col-md-12 text-left">
        <h2 class="bd-title">Editar Usuario</h2>
    </div>
</div>
<br>
<div class="card mt-5">
    <div class="card-body">

        <form action="./?controller=usuario&action=editar" method="post" id="crearUsuario" name="crearUsuario">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Código <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="usuario_id" name="usuario_id" value="<?php echo $usuario->usuario_id ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Nombre <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="usuario_nombre" name="usuario_nombre" required  value="<?php echo $usuario->usuario_nombre ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Clave:</label>
                    <input class="form-control" type="text" id="usuario_clave" name="usuario_clave" value="<?php echo $usuario->usuario_clave ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Email:</label>
                    <input class="form-control" type="text" id="usuario_email" name="usuario_email" value="<?php echo $usuario->usuario_email ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Fecha Registro:</label>
                    <input class="form-control" type="text" id="usuario_freg" name="usuario_freg" value="<?php echo $usuario->usuario_freg ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Nivel Acceso:</label>
                    <input class="form-control" type="text" id="nivel_acceso" name="nivel_acceso" value="<?php echo $usuario->nivel_acceso ?>">
                </div>
            </div>

            <div class="text-center mt-3">
                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-primary" value="Guardar">
                <a class="btn btn-warning" onclick="history.back()" >Cancelar</a>
            </div>

        </form>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#crearUsuario").validate({
            messages : {
                cod_item: {
                    required: "Ingrese el Código"
                },
                nom_item: {
                    required: "Ingrese el nombre del Usuario"
                }
            }
        });
    });
</script>
