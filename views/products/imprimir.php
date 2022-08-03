<?php
//var_dump($productos);
?>
<table style="width: 100%; border: 0px solid #000000">
    <tr>
        <td><img src=./assets/img/carioca_logo_bn.jpg width=250 height=90></td>
        <td>
            <table style="width: 100%">
                <tr><td style="text-align: right"><b>CASA CARIOCA Ltda.</b></td></tr>
                <tr><td style="text-align: right">Manzana 6, Galpón 30</td></tr>
                <tr><td style="text-align: right">Zona Franca - Iquique</td></tr>
                <tr><td style="text-align: right">Tel/Fax: 00 - 56 - 57 - 2473515</td></tr>
                <!-- <tr><td align=right><FONT SIZE=2>Fax: 00 - 56 - 57 - 475525&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</FONT></td></tr>-->
            </table>
        </td>
    </tr>
</table>
<br>
<table style="width: 100%">
    <tr style="background-color: #ededef">
        <td style="font-size: 18px;"><strong>Lista Productos (<?php echo $_REQUEST['tipo'] ?>)</strong></td>
        <td style="font-size: 18px; text-align: right">&nbsp;</td>
    </tr>
</table>
<br>

<table class="table table-sm" id="listaMovimientos"">
    <thead class="table-light">
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Unidad</th>

        <?php
        if ($_REQUEST['tipo'] == "existencia"){
        ?>
            <th style="text-align: right">Precio U.</th>
            <th style="text-align: right">Cant. Caja</th>
            <th style="text-align: right">Existencia</th>
        <?php
        } else if ($_REQUEST['tipo'] == "precios") {
        ?>
            <th style="text-align: right">Precio U.</th>
        <?php
        } else if ($_REQUEST['tipo'] == "disponibles") {
        ?>
            <th style="text-align: right">Existencia</th>
        <?php
        } else if ($_REQUEST['tipo'] == "sinprecio") {
        ?>
            <th style="text-align: right">Precio U.</th>
            <th style="text-align: right">Cant. Caja</th>
        <?php
        }
        ?>

    </tr>
    </thead>
    <tbody>
    <?php

    $cont = 1;
    foreach ($productos as $row){//$productos viene de productController
        ?>
        <tr style="border-bottom: 1px solid #ededef">
            <td><?php echo $row->codigo ?></td>
            <td><?php echo $row->producto ?></td>
            <td><?php echo $row->unidad ?></td>
            <?php
            if ($_REQUEST['tipo'] == "existencia"){
            ?>
            <td style="text-align: right"><?php echo $row->precio ?></td>
            <td style="text-align: right"><?php echo $row->caja ?></td>
            <td style="text-align: right"><?php echo $row->existencia ?></td>
            <?php
            } else if ($_REQUEST['tipo'] == "precios") {
            ?>
            <td style="text-align: right"><?php echo $row->precio ?></td>
            <?php
            } else if ($_REQUEST['tipo'] == "disponibles") {
            ?>
            <td style="text-align: right"><?php echo $row->existencia ?></td>
            <?php
            } else if ($_REQUEST['tipo'] == "sinprecio") {
            ?>
            <td style="text-align: right"><?php echo $row->precio ?></td>
            <td style="text-align: right"><?php echo $row->caja ?></td>
            <?php
            }
            ?>
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
