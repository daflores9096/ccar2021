<div class="mt-3">
    <a href="?controller=products&action=crear" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Agregar Producto</a>
</div>
<br>
<table class="table" id="listaProductos">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Producto</th>
        <th scope="col">Unidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Existencia</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($productos as $row){//$productos viene de productController
    ?>
    <tr>
        <th scope="row"><?php echo $cont ?></th>
        <td><?php echo $row->codigo ?></td>
        <td><?php echo $row->producto ?></td>
        <td><?php echo $row->unidad ?></td>
        <td><?php echo $row->precio ?></td>
        <td><?php echo $row->existencia ?></td>
        <td>
            <div class="btn-group" role="group" aria-label>
                <a href="?controller=products&action=editar&codigo=<?php echo $row->codigo; ?>" type="button" class="btn btn-primary"><i class="fas fa-edit"></i></a> &nbsp; <a href="javascript:void(0)" onclick="eliminarProducto('<?php echo $row->codigo ?>'); return false;" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
        $('#listaProductos').DataTable({
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