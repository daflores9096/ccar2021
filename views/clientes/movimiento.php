<?php
//var_dump($movimientoCliente);
//var_dump($infoCliente);
?>

<br>
<h1 class="bd-title" id="content">Movimiento Cliente <?php echo $infoCliente->nom_cli ?></h1>
<br>
<table class="display compact" id="movimientoCliente">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nro.Venta</th>
        <th scope="col">Fecha</th>
        <th scope="col">Traspaso</th>
        <th scope="col">Total Bultos</th>
        <th scope="col">Total Venta</th>
        <th scope="col" width="30">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    $total_Ventas = 0;
    foreach ($movimientoCliente as $row){//$productos viene de productController
        ?>
        <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row['cod_fac'] ?></td>
            <td><?php echo $row['fecha_fac'] ?></td>
            <td><?php echo $row['traspaso'] ?></td>
            <td style="text-align: right"><?php echo $row['tot_bul'] ?></td>
            <td style="text-align: right"><?php echo $row['total_fac'] ?></td>
            <td>
                <div class="btn-group" role="group" aria-label>
                    <a href="?controller=ventas&action=nota&cod_fac=<?php echo $row['cod_fac']; ?>" type="button" class="btn btn-primary" title="Editar" style="background-color: steelblue"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;
                </div>
            </td>
        </tr>
        <?php
        $cont++;
        $total_Ventas = $total_Ventas + $row['total_fac'];
    }
    ?>
    </tbody>
</table>
<br>
<div class="container" style="background-color: #ededef; padding: 5px 20px 5px 20px">
    <div class="row">
        <div class="col-md-6"><h3>Total Ventas Realizadas:</h3></div>
        <div class="col-md-6" style="text-align: right; padding-right: 50px"><h3><?php echo $total_Ventas; ?></h3></div>
    </div>
</div>



<div class="text-center mt-3">
    <!--                <input type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-success" value="Guardar">-->
    <a class="btn btn-danger" onclick="history.back()" >Volver</a>
</div>

<script>
    $(document).ready(function() {
        $('#movimientoCliente').DataTable({
            stateSave: true,
            stripeClasses:[],
            "language": {
                "emptyTable": "No hay registros que mostrar",
                "zeroRecords":    "No hay registros que coincidan",
                "lengthMenu": "Mostrar _MENU_ registros por p??gina",
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
        swal("??Est?? seguro que desea eliminar el Cliente "+id+"?", {
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
