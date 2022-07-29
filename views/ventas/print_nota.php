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
<table style="width: 100%; background-color: #F8F9FA;">
    <tr>
        <td style="padding: 5px"><strong>Nro. Nota: </strong></td>
        <td style="padding: 5px"><?php echo $venta->cod_fac; ?></td>
        <td style="padding: 5px; text-align: right"><strong>Fecha: </strong></td>
        <td style="padding: 5px; text-align: right"><?php echo $venta->fecha_fac; ?></td>
    </tr>
    <tr>
        <td style="padding: 5px"><strong>Cliente: </strong></td>
        <td style="padding: 5px"><?php echo $venta->nom_cli; ?></td>
        <td style="padding: 5px; text-align: right"><strong>Dirección Cliente: </strong></td>
        <td style="padding: 5px; text-align: right"><?php echo $venta->dire_cli; ?></td>
    </tr>
    <tr>
        <td style="padding: 5px"><strong>Traspaso: </strong></td>
        <td style="padding: 5px"><?php echo $venta->traspaso; ?></td>
    </tr>
</table>

<table class="table table-sm">
    <thead class="table-light">
    <tr>
        <th>Codigo</th>
        <th>Detalle</th>
        <th class="text-right">Bultos</th>
        <th class="text-right">Cantidad</th>
        <th class="text-right">Costo U.</th>
        <th class="text-right">Importe</th>
    </tr>
    </thead>
    <?php
    echo "<br>";
    foreach ($ventaList as $row){
        ?>
        <tr>
            <td><?php echo $row['cod_item']; ?></td>
            <td><?php echo $row['producto']; ?></td>
            <td class="text-right"><?php echo $row['bultos']; ?></td>
            <td class="text-right"><?php echo $row['cant_fac']; ?></td>
            <td class="text-right"><?php echo $row['precio_uni']; ?></td>
            <td class="text-right"><?php echo $row['importe_fac']; ?></td>
        </tr>
        <?php
    }
    ?>
    <tfoot>
    <tr style="background-color: #E9ECEF">
        <td class="text-left">&nbsp;</td>
        <td class="text-right"><strong>Total Bultos: </strong></td>
        <td class="text-right"><strong><?php echo $venta->tot_bul ?></strong></td>
        <td class="text-left">&nbsp;</td>
        <td class="text-right"><strong>Total Venta: </strong></td>
        <td class="text-right"><strong><?php echo $venta->total_fac ?></strong></td>
    </tr>
    </tfoot>
</table>



<script>
    $(document).ready(function() {
        $("body > div.container > div.navbar.yamm.navbar-default.navbar-fixed-top").hide();
    });
</script>
