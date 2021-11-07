
<br>
<div class="card mt-5">
    <div class="card-header">
        <h4><strong>Movimientos del producto: "<?php echo $producto->producto; ?>" </strong></h4>
    </div>
    <div class="card-body">
        <table class="display compact" id="listaMovimientos">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nro. Nota</th>
                <th scope="col">Cliente/Proveedor</th>
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $cont = 1;
            foreach ($movimientos as $row){//$productos viene de productController
                ?>
                <tr>
                    <th><?php echo $cont ?></th>
                    <td><?php echo $row->tipo_mov ?></td>
                    <td><?php echo $row->fecha_mov ?></td>
                    <td><?php echo $row->cod_mov ?></td>
                    <td><?php echo $row->nom_cli_pro ?></td>
                    <td><?php echo $row->entrada ?></td>
                    <td><?php echo $row->salida ?></td>
                    <td align="center">
                        <div class="btn-group" role="group" aria-label>
                            <a href="?controller=products&action=editar&codigo=<?php echo $row->codigo; ?>" type="button" class="btn btn-warning">Ver detalle</a>
                        </div>
                    </td>
                </tr>
                <?php
                $cont++;
            }
            ?>
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a class="btn btn-danger" onclick="history.back()" >Volver</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#listaMovimientos').DataTable({
            stripeClasses:[],
            "language": {
                "emptyTable": "No hay registros que mostrar",
                "zeroRecords":    "No hay registros que coincidan",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "search": "Buscar: ",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                "infoEmpty":      "Mostrando 0 registros",
                "infoFiltered":   "(filtrado de _MAX_ registros en total)",
            }
        });
    } );
</script>
