<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h1 class="bd-title">Lista de Clientes</h1>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 20px">
        <a href="?controller=cliente&action=crear" type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> Agregar Cliente</a>
    </div>
</div>
<br>

<table class="display compact" id="listaClientes">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($cliente as $row){//$productos viene de productController
        ?>
        <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row->cod_cli ?></td>
            <td><?php echo $row->nom_cli ?></td>
            <td><?php echo $row->ciudad_cli ?></td>
            <td><?php echo $row->tel_cli ?></td>
            <td><?php echo $row->email_cli ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=cliente&action=detalle&cod_cli=<?php echo $row->cod_cli; ?>" type="button" class="btn btn-primary" title="Ver detalle" style="margin-right: 7px"><i class="fas fa-eye"></i></a>
                    <a href="javascript:void(0)" onclick="eliminarCliente('<?php echo $row->cod_cli ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
<!--                    <a href="?controller=cliente&action=movimiento&cod_cli=--><?php //echo $row->cod_cli; ?><!--" type="button" class="btn btn-warning"><i class="fas fa-book"  title="Ver Movimientos"></i></a>-->
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
        $('#listaClientes').DataTable({
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

    function eliminarCliente(id){
        swal("¿Está seguro que desea eliminar el Cliente "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=cliente&action=borrar&cod_cli='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
