<?php
//var_dump($producto);
?>
<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 text-left">
                <h4><strong>PRODUCTO: <?php echo  $producto->codigo.' - '.$producto->producto ?></strong></h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="./?controller=products&action=editar&codigo=<?php echo $producto->codigo ?>" class="btn btn-primary" style="background-color: steelblue; float: right"><i class="fas fa-edit"></i> Editar</a> <a href="./?controller=movimientos&action=lista&cod_prod=<?php echo $producto->codigo ?>" class="btn btn-primary" style="background-color: steelblue; margin-right: 10px; float: right"><i class="fas fa-book"></i> Movimiento</a>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-responsive">
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr>
                        <th style="width: 50%"><p>Código</p></th>
                        <td style="width: 50%"><?php echo $producto->codigo ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Nombre del Producto</p></th>
                        <td style="width: 50%"><?php echo $producto->producto ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Unidad</p></th>
                        <td style="width: 50%"><?php echo $producto->unidad ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Precio</p></th>
                        <td style="width: 50%"><?php echo $producto->precio ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Cantidad por Caja</p></th>
                        <td style="width: 50%"><?php echo $producto->caja ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Existencia Actual</p></th>
                        <td style="width: 50%"><?php echo $producto->existencia ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Existencia Máxima</p></th>
                        <td style="width: 50%"><?php echo $producto->exi_max ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Existencia Mínima</p></th>
                        <td style="width: 50%"><?php echo $producto->exi_min ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Descripción</p></th>
                        <td style="width: 50%"><?php echo $producto->detalle ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-danger" onclick="history.back()" >Volver</a>
        </div>

    </div>

</div>
