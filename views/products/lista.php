<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h1 class="bd-title">Lista de Productos</h1>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 20px">
        <a href="?controller=products&action=crear" type="button" class="btn btn-primary"><i class="fas fa-plus-square"></i> Agregar Producto</a>
        <div class="dropdown" style="width: 105px; float: right; padding-left: 3px">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-print"></i> Imprimir
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="./?controller=products&action=imprimir&tipo=existencia" target="_blank">Lista Existencia</a></li>
                <li><a href="./?controller=products&action=imprimir&tipo=precios" target="_blank">Lista Precios</a></li>
                <li><a href="./?controller=products&action=imprimir&tipo=disponibles" target="_blank">Lista Disponibles</a></li>
                <li><a href="./?controller=products&action=imprimir&tipo=sinprecio" target="_blank">Lista Sin Precio</a></li>
            </ul>
        </div>
    </div>



</div>
<br>
<table class="display compact" id="listaProductos">
    <thead>
    <tr>
        <th>#</th>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Unidad</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($productos as $row){//$productos viene de productController
    ?>
    <tr>
        <th><?php echo $cont ?></th>
        <td><?php echo $row->codigo ?></td>
        <td><?php echo $row->producto ?></td>
        <td><?php echo $row->unidad ?></td>
        <td><?php echo $row->precio ?></td>
        <td><?php echo $row->existencia ?></td>
        <td>
            <div class="btn-group" role="group" aria-label>
                <a href="?controller=products&action=detalle&cod_prod=<?php echo $row->codigo; ?>" type="button" class="btn btn-primary" title="Detalle" style="margin-right: 4px"><i class="fas fa-eye"></i></a>&nbsp;
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
        $('#listaProductos').DataTable({
            stateSave: true,
            //order: [[2, 'asc']],
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
