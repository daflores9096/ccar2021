<div class="card mt-5">
    <div class="card-header">
        <strong>AGREGAR PRODUCTO</strong>
    </div>
    <div class="card-body">

        <form action="" method="post" id="crearProd" name="crearProd">
            <div class="mb-3">
                <label class="form-label" for="cod_item">Código:</label>
                <input class="form-control" type="text" id="cod_item" name="cod_item" required placeholder="Ingrese el código">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nom_item">Nombre Producto:</label>
                <input class="form-control" type="text" id="nom_item" name="nom_item" required placeholder="Ingrese el nombre del producto">
            </div>
            <div class="mb-3">
                <label class="form-label" for="unid_item">Unidad:</label>
                <input class="form-control" type="text" id="unid_item" name="unid_item" placeholder="Ingrese la unidad de medida">
            </div>
            <div class="mb-3">
                <label class="form-label" for="precio_item">Precio:</label>
                <input class="form-control" type="text" id="precio_item" name="precio_item" placeholder="Ingrese el precio de venta">
            </div>
            <div class="mb-3">
                <label class="form-label" for="caja_item">Cantidad por Caja:</label>
                <input class="form-control" type="text" id="caja_item" name="caja_item" placeholder="Ingrese el número de items por caja">
            </div>
            <div class="mb-3">
                <label class="form-label" for="existencia">Existencia Actual:</label>
                <input class="form-control" type="text" id="existencia" name="existencia" placeholder="Ingrese la existencia actual">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exi_max">Existencia Máxima:</label>
                <input class="form-control" type="text" id="exi_max" name="exi_max" placeholder="Ingrese la existencia máxima">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exi_min">Existencia Mínima:</label>
                <input class="form-control" type="text" id="exi_min" name="exi_min" placeholder="Ingrese la existencia mínima">
            </div>
            <div class="mb-3">
                <label class="form-label" for="deta_item">Descripción:</label>
                <input class="form-control" type="text" id="deta_item" name="deta_item">
            </div>

            <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">
            <a class="btn btn-danger" href="?controller=products&action=lista">Cancelar</a>
        </form>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#crearProd").validate({
                messages : {
                    cod_item: {
                        required: "Ingrese el Código"
                    },
                    nom_item: {
                        required: "Ingrese el nombre del Producto"
                    }
                }
        });
    });
</script>