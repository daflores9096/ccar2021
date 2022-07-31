<?php
//var_dump($movimientos);
//var_dump($producto);
?>
<table style="width: 100%; border: 1px solid #000000; margin-top: 5px">
    <tr><td style="font-size: 26px; padding: 5px 5px 5px 5px"><b>CASA CARIOCA Ltda.</b></td></tr>
    <tr><td style="font-size: 18px; padding: 1px 5px 15px 5px"><b>Manzana 4, Galpón28</b></td></tr>
    <tr><td style="font-size: 18px; padding: 5px"><b>Movimientos del producto: "<?php echo $producto->producto; ?>"</b></td></tr>
</table>
<br>
<table style="width: 100%">
    <tr style="background-color: #ededef">
        <td style="font-size: 18px;"><strong>Saldo actual del Producto: </strong></td>
        <td style="font-size: 18px; text-align: right"><strong><?php echo $producto->existencia.' '.$producto->unidad ?></strong></td>
    </tr>
</table>
<br>
<table class="table table-sm" id="listaMovimientos"">
    <thead class="table-light">
    <tr>
        <th style="text-align: center">Tipo</th>
        <th style="text-align: center">Fecha</th>
        <th>Nro. Nota</th>
        <th>Cliente/Proveedor</th>
        <th style="text-align: right">Entrada</th>
        <th style="text-align: right">Salida</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($movimientos as $row){//$productos viene de productController
        ?>
        <tr style="border-bottom: 1px solid #ededef">
            <td style="text-align: center"><?php echo $row->tipo_mov ?></td>
            <td style="text-align: center"><?php echo $row->fecha_mov ?></td>
            <td><?php echo $row->cod_mov ?></td>
            <td><?php echo $row->nom_cli_pro ?></td>
            <td style="text-align: right"><?php echo $row->entrada ?></td>
            <td style="text-align: right"><?php echo $row->salida ?></td>
        </tr>
        <?php
        $cont++;
    }
    ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $(".navbar").hide();
    } );
</script>
