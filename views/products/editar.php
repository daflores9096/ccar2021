<div class="card mt-5">
    <div class="card-header">
        <strong>EDITAR PRODUCTO</strong>
    </div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label" for="cod_item">Código:</label>
                <input class="form-control" type="text" id="cod_item" name="cod_item" required value="<?php echo $producto->codigo ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nom_item">Nombre Producto:</label>
                <input class="form-control" type="text" id="nom_item" name="nom_item" required value="<?php echo $producto->producto ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="unid_item">Unidad:</label>
                <input class="form-control" type="text" id="unid_item" name="unid_item" value="<?php echo $producto->unidad ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="precio_item">Precio:</label>
                <input class="form-control" type="text" id="precio_item" name="precio_item" value="<?php echo $producto->precio ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="caja_item">Cantidad por Caja:</label>
                <input class="form-control" type="text" id="caja_item" name="caja_item" value="<?php echo $producto->caja ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="existencia">Existencia Actual:</label>
                <input class="form-control" type="text" id="existencia" name="existencia" value="<?php echo $producto->existencia ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exi_max">Existencia Máxima:</label>
                <input class="form-control" type="text" id="exi_max" name="exi_max" value="<?php echo $producto->exi_max ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exi_min">Existencia Mínima:</label>
                <input class="form-control" type="text" id="exi_min" name="exi_min" value="<?php echo $producto->exi_min ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="deta_item">Descripción:</label>
                <input class="form-control" type="text" id="deta_item" name="deta_item" value="<?php echo $producto->detalle ?>">
            </div>

            <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar cambios">
            <a class="btn btn-danger" href="?controller=products&action=lista">Cancelar</a>
        </form>
    </div>

</div>