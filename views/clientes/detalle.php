<?php
//var_dump($cliente);
?>
<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">Detalle Cliente</h2>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 10px">
        <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;<a href="./?controller=cliente&action=editar&cod_cli=<?php echo $cliente->cod_cli ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>&nbsp;&nbsp;<a href="./?controller=cliente&action=movimiento&cod_cli=<?php echo $cliente->cod_cli ?>" class="btn btn-primary"><i class="fas fa-book"></i> Movimiento</a>
    </div>
</div>

<div class="row" style="background: #F8F8F8; border: 1px solid #ededef">
    <div class="col-md-12 text-left" style="margin-bottom: 10px; margin-top: 10px; font-size: 20px">
        <?php echo $cliente->nom_cli ?>
    </div>
</div>

<div class="card mt-5">

    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                <br>
                <table class="table table-responsive">
                    <!--                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>-->
                    <tr>
                        <th style="width: 50%"><p>Código</p></th>
                        <td style="width: 50%"><?php echo $cliente->cod_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Nombre</p></th>
                        <td style="width: 50%"><?php echo $cliente->nom_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Contacto Secundario</p></th>
                        <td style="width: 50%"><?php echo $cliente->contacto_sec ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Dirección</p></th>
                        <td style="width: 50%"><?php echo $cliente->dire_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Dirección Secundaria</p></th>
                        <td style="width: 50%"><?php echo $cliente->dire_sec ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Ciudad</p></th>
                        <td style="width: 50%"><?php echo $cliente->ciudad_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Teléfono</p></th>
                        <td style="width: 50%"><?php echo $cliente->tel_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Teléfono Secundario</p></th>
                        <td style="width: 50%"><?php echo $cliente->tel_sec ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Correo Electrónico</p></th>
                        <td style="width: 50%"><?php echo $cliente->email_cli ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Descripción</p></th>
                        <td style="width: 50%"><?php echo $cliente->desc_cli ?></td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="text-center mt-3">
            <!--            <a class="btn btn-primary" onclick="history.back()" >Volver</a>-->
        </div>

    </div>

</div>