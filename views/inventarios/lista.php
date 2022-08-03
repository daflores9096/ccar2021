<br>
<div class="row">
    <div class="col-md-6 text-left" style="padding-bottom: 5px">
        <h1 class="bd-title">Lista Inventarios</h1>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 20px">
        <a href="?controller=inventarios&action=crear" type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> Agregar Inventario</a>
    </div>
</div>
<br>

<table class="display compact" id="listaInventarios">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Fecha Levantamiento</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha Aplicación</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($inventarios as $row){//$inventarios viene de inventariosController
        ?>
        <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row->id_inv ?></td>
            <td><?php echo $row->fecha_lev ?></td>
            <td><?php echo $row->descripcion ?></td>
            <td><?php echo $row->fecha_ap ?></td>
            <td><?php echo $row->estado ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=inventarios&action=detalle&id_inv=<?php echo $row->id_inv; ?>" type="button" class="btn btn-primary" title="Detalle" style="margin-right: 7px"><i class="fas fa-eye"></i></a>
                    <?php
                    if ($row->estado != 'Aplicado'){
                    ?>
                        <a href="javascript:void(0)" onclick="eliminarInventario('<?php echo $row->id_inv ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
                    <?php
                    }
                    ?>

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
        $('#listaInventarios').DataTable({
            stateSave: true,
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

    function eliminarInventario(id){
        swal("¿Está seguro que desea eliminar el Inventario "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=inventarios&action=borrar&id_inv='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
