<br>
<div class="jumbotron">
    <h2 class="display-4">Sistema de Control</h2>
    <hr class="my-4">
    <?php
    //var_dump($_SESSION);
    ?>

    <table>
        <tr>
            <td><h3><i class="fas fa-boxes"></i> Productos</h3></td>
        </tr>
        <tr>
            <td style="padding-left: 34px"><a href="./?controller=products&action=lista">Lista de Productos</a> - <a href="./?controller=inventarios&action=lista">Inventario F&iacute;sico</a></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><h3><i class="fas fa-coins"></i> Movimientos</h3></td>
        </tr>
        <tr>
            <td style="padding-left: 33px"><a href="./?controller=compras&action=lista">Compras</a> - <a href="./?controller=ventas&action=lista">Ventas</a></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><h3><i class="fas fa-address-book"></i> Contactos</h3></td>
        </tr>
        <tr>
            <td style="padding-left: 33px"><a href="./?controller=proveedor&action=lista">Proveedores</a> - <a href="./?controller=cliente&action=lista">Clientes</a></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><h3><i class="fas fa-tools"></i> Configuraci&oacute;n</h3></td>
        </tr>
        <tr>
            <td style="padding-left: 34px"><a href="./?controller=usuario&action=lista">Usuarios</a></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
    </table>

    <hr class="my-4">
    <span style="float: right">ccar9096 - Ver. 2.0</span>

</div>
