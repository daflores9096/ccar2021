<?php
//var_dump($lastId);
$cod_user_new = $lastId + 1;
?>
<br>
<div class="row">
    <div class="col-md-12 text-left">
        <h2 class="bd-title">Crear Usuario</h2>
    </div>
</div>
<br>
<div class="card mt-5">
    <!--    <div class="card-header">-->
    <!--        <h4><strong>AGREGAR NUEVO PROVEEDOR</strong></h4>-->
    <!--    </div>-->
    <div class="card-body">

        <form action="" method="post" id="crearPro" name="crearPro">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Código <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="usuario_id" name="usuario_id" value="<?php echo $cod_user_new ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Nombre <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="usuario_nombre" name="usuario_nombre" required placeholder="Ingrese el nombre del Usuario">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Clave:</label>
                    <input class="form-control" type="text" id="usuario_clave" name="usuario_clave" placeholder="Ingrese la clave">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Email:</label>
                    <input class="form-control" type="text" id="usuario_email" name="usuario_email" placeholder="Ingrese el email">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Fecha Registro:</label>
                    <input class="form-control" type="text" id="usuario_freg" name="usuario_freg" value="<?php echo date("Y-m-d") ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="existencia">Nivel Acceso:</label>
                    <input class="form-control" type="text" id="nivel_acceso" name="nivel_acceso" placeholder="Ingrese el nivel de acceso">
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
