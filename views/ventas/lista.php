<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h1 class="bd-title">Lista de Ventas</h1>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 20px">
        <a href="?controller=ventas&action=crear" type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> Agregar Venta</a>
    </div>
</div>
<br>

<table class="display compact" id="listaVentas">
    <thead>
    <tr>
<!--        <th scope="col">#</th>-->
        <th scope="col">Nro.Venta</th>
        <th scope="col">Fecha</th>
        <th scope="col">Cliente</th>
        <th scope="col">Total</th>
        <th scope="col" class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($ventas as $row){//$productos viene de productController
        ?>
        <tr>
<!--            <th>--><?php //echo $cont ?><!--</th>-->
            <td><?php echo $row->cod_fac ?></td>
            <td><?php echo $row->fecha_fac ?></td>
            <td><?php echo $row->nom_cli ?></td>
            <td><?php echo $row->total_fac ?></td>
            <td class="text-center">
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=ventas&action=detalle&cod_fac=<?php echo $row->cod_fac; ?>" type="button" class="btn btn-primary" title="Ver detalle" style="margin-right: 3px"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;
                    <a href="javascript:void(0)" onclick="eliminarVenta('<?php echo $row->cod_fac ?>'); return false;" type="button" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
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
        $('#listaVentas').DataTable({
            stateSave: true,
            order: [[1, 'desc']],
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

    function eliminarVenta(id){
        swal("¿Está seguro que desea eliminar la Venta "+id+"?", {
            buttons: {
                aceptar: "Aceptar",
                cancel: "Cancelar",
            },
        })
            .then((value) => {
                switch (value) {

                    case "aceptar":
                        this.location.href = './?controller=ventas&action=borrar&cod_fac='+id;
                        break;

                    default:
                        return false;
                }
            });
    }
</script>
