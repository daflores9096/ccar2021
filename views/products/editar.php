<br>
<div class="row">
    <div class="col-md-12 text-left">
        <h2 class="bd-title">Editar Producto</h2>
    </div>
</div>
<br>
<div class="card mt-5">
    <div class="card-body">

        <form action="" method="post">
            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="cod_item"><strong>Código <span style="color: red">(*)</span>:</strong></label>
                    <input class="form-control" type="text" id="cod_item" name="cod_item" required value="<?php echo $producto->codigo ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="nom_item"><strong>Nombre Producto <span style="color: red">(*)</span>:</strong></label>
                    <input class="form-control" type="text" id="nom_item" name="nom_item" required value="<?php echo $producto->producto ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="unid_item"><strong>Unidad:</strong></label>
                    <input class="form-control" type="text" id="unid_item" name="unid_item" value="<?php echo $producto->unidad ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="precio_item"><strong>Precio:</strong></label>
                    <input class="form-control" type="text" id="precio_item" name="precio_item" value="<?php echo $producto->precio ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="caja_item"><strong>Cantidad por Caja:</strong></label>
                    <input class="form-control" type="text" id="caja_item" name="caja_item" value="<?php echo $producto->caja ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="existencia"><strong>Existencia Actual:</strong></label>
                    <input class="form-control" type="text" id="existencia" name="existencia" value="<?php echo $producto->existencia ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="exi_max"><strong>Existencia Máxima:</strong></label>
                    <input class="form-control" type="text" id="exi_max" name="exi_max" value="<?php echo $producto->exi_max ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-group">
                    <label class="form-label" for="exi_min"><strong>Existencia Mínima:</strong></label>
                    <input class="form-control" type="text" id="exi_min" name="exi_min" value="<?php echo $producto->exi_min ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label for="deta_item"><strong>Descripción:</strong></label>
                    <textarea class="form-control" name="deta_item" id="deta_item" rows="3"><?php echo $producto->detalle ?></textarea>
                </div>
            </div>
            <div class="text-center mt-3">
                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-primary" value="Guardar">
                <a type="button" class="btn btn-warning" onclick="history.back()" >Cancelar</a>
            </div>

        </form>
    </div>

</div>
