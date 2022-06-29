<style>
    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-left{
        text-align: left;
    }
</style>

<?php
//var_dump($compraList);
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

<table style="width: 100%; background-color: #F8F9FA; margin-top: 10px">
    <tr>
        <td style="padding: 5px"><strong>Nro. Nota: </strong></td>
        <td style="padding: 5px"><?php echo $compra->cod_fac; ?></td>
        <td style="padding: 5px; text-align: right"><strong>Fecha: </strong></td>
        <td style="padding: 5px; text-align: right"><?php echo $compra->fecha_fac; ?></td>
    </tr>
    <tr>
        <td style="padding: 5px"><strong>Proveedor: </strong></td>
        <td style="padding: 5px"><?php echo $compra->nom_pro; ?></td>
    </tr>
</table>


<table class="table">
    <thead class="table-light">
    <tr>
        <th>Codigo</th>
        <th>Artículo</th>
        <th>Unidad</th>
<!--        <th class="text-right">Cantidad</th>-->
<!--        <th class="text-right">P. Compra</th>-->
        <th class="text-right">P. Venta</th>
<!--        <th class="text-right">Sub Total</th>-->
    </tr>
    </thead>
    <?php
    echo "<br>";
    foreach ($compraList as $row){
        ?>
        <tr>
            <td><?php echo $row['cod_item']; ?></td>
            <td><?php echo $row['nom_item']; ?></td>
            <td><?php echo $row['unid_item']; ?></td>
<!--            <td class="text-right">--><?php //echo $row['cant_fac']; ?><!--</td>-->
<!--            <td class="text-right">--><?php //echo $row['precio_uni']; ?><!--</td>-->
            <td class="text-right"><?php echo $row['precio_ven']; ?></td>
<!--            <td class="text-right">--><?php //echo $row['importe_fac']; ?><!--</td>-->
        </tr>
        <?php
    }
    ?>
<!--    <tfoot>-->
<!--    <tr style="background-color: #E9ECEF">-->
<!--        <td class="text-left" colspan="6"><strong>Total Compra: </strong></td>-->
<!--        <td class="text-right"><strong>--><?php //echo $compra->total_fac ?><!--</strong></td>-->
<!--    </tr>-->
<!--    </tfoot>-->
</table>


<script>
    $(document).ready(function() {
        $("nav.navbar.navbar-expand-lg").hide();
    });
</script>
