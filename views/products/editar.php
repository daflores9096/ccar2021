<div class="card mt-5">
    <div class="card-header">
        <h4><strong>EDITAR PRODUCTO</strong></h4>
    </div>
    <div class="card-body">

        <form action="" method="post">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="cod_item">Código <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="cod_item" name="cod_item" required value="<?php echo $producto->codigo ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="nom_item">Nombre Producto <span style="color: red">(*)</span>:</label>
                    <input class="form-control" type="text" id="nom_item" name="nom_item" required value="<?php echo $producto->producto ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="unid_item">Unidad:</label>
                    <input class="form-control" type="text" id="unid_item" name="unid_item" value="<?php echo $producto->unidad ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="precio_item">Precio:</label>
                    <input class="form-control" type="text" id="precio_item" name="precio_item" value="<?php echo $producto->precio ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="caja_item">Cantidad por Caja:</label>
                    <input class="form-control" type="text" id="caja_item" name="caja_item" value="<?php echo $producto->caja ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="existencia">Existencia Actual:</label>
                    <input class="form-control" type="text" id="existencia" name="existencia" value="<?php echo $producto->existencia ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_max">Existencia Máxima:</label>
                    <input class="form-control" type="text" id="exi_max" name="exi_max" value="<?php echo $producto->exi_max ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label" for="exi_min">Existencia Mínima:</label>
                    <input class="form-control" type="text" id="exi_min" name="exi_min" value="<?php echo $producto->exi_min ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <label for="deta_item">Descripción:</label>
                    <textarea class="form-control" name="deta_item" id="deta_item" rows="3"><?php echo $producto->detalle ?></textarea>
                </div>
            </div>
            <div class="text-center mt-3">
                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
                <a class="btn btn-danger" onclick="history.back()" >Cancelar</a>
            </div>

        </form>
    </div>

</div>
