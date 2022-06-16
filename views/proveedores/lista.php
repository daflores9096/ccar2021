<br>
<h1 class="bd-title" id="content">Lista de Proveedores</h1>
<div class="mt-3">
    <a href="?controller=proveedor&action=crear" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Agregar Proveedor</a>
</div>
<br>
<table class="display compact" id="listaProveedores">
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
    foreach ($proveedor as $row){//$productos viene de productController
        ?>
        <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row->cod_pro ?></td>
            <td><?php echo $row->nom_pro ?></td>
            <td><?php echo $row->ciudad_pro ?></td>
            <td><?php echo $row->tel_pro ?></td>
            <td><?php echo $row->email_pro ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=proveedor&action=editar&cod_pro=<?php echo $row->cod_pro; ?>" type="button" class="btn btn-primary" title="Editar" style="background-color: steelblue"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick="eliminarProveedor('<?php echo $row->cod_pro ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
                    <!--                    <a href="?controller=movimientos&action=lista&cod_prod=--><?php //echo $row->codigo; ?><!--" type="button" class="btn btn-warning"><i class="fas fa-book"  title="Ver Movimientos"></i></a>-->
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
        $('#listaProveedores').DataTable({
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

    function eliminarProveedor(id){
        swal("¿Está seguro que desea eliminar el Proveedor "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=proveedor&action=borrar&cod_pro='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
