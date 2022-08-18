<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h1 class="bd-title">Lista de Usuarios</h1>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 20px">
        <a href="?controller=usuario&action=crear" type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> Agregar Usuario</a>
    </div>
</div>
<br>

<table class="display compact" id="listaUsuarios">
    <thead>
    <tr>
<!--        <th scope="col">#</th>-->
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha Registro</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($usuario as $row){//$usuario viene de usuarioController
        ?>
        <tr>
<!--            <th>--><?php //echo $cont ?><!--</th>-->
            <td><?php echo $row->usuario_id ?></td>
            <td><?php echo $row->usuario_nombre ?></td>
<!--            <td>--><?php //echo $row->usuario_clave ?><!--</td>-->
            <td><?php echo $row->usuario_email ?></td>
            <td><?php echo $row->usuario_freg ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=usuario&action=detalle&usuario_id=<?php echo $row->usuario_id; ?>" type="button" class="btn btn-primary" title="Ver Detalle" style="margin-right: 4px"><i class="fas fa-eye"></i></a>
                    <a href="javascript:void(0)" onclick="eliminarUsuario('<?php echo $row->usuario_id ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
                    <!--                    <a href="?controller=proveedor&action=movimiento&cod_pro=--><?php //echo $row->cod_pro; ?><!--" type="button" class="btn btn-warning"><i class="fas fa-book" title="Ver Movimientos"></i></a>-->
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
        $('#listaUsuarios').DataTable({
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

    function eliminarUsuario(id){
        swal("¿Está seguro que desea eliminar al Usuario "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=usuario&action=borrar&usuario_id='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
