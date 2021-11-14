<div class="mt-3">
    <a href="?controller=compras&action=crear" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Agregar Compra</a>
</div>
<br>
<table class="display compact" id="listaCompras">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nro.Compra</th>
        <th scope="col">Fecha</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Total</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($compras as $row){//$productos viene de productController
        ?>
        <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row->cod_fac ?></td>
            <td><?php echo $row->fecha_fac ?></td>
            <td><?php echo $row->nom_pro ?></td>
            <td><?php echo $row->total_fac ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=products&action=editar&codigo=<?php echo $row->codigo; ?>" type="button" class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick="eliminarProducto('<?php echo $row->codigo ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
                </div>
            </td>
        </tr>
        <?php
        $cont++;
    }
    ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#listaCompras').DataTable({
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

    function eliminarProducto(id){
        swal("¿Está seguro que desea eliminar el producto "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=products&action=borrar&codigo='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
