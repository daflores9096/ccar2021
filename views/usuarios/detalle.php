<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">Detalle Usuario</h2>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 10px">
        <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;<a href="./?controller=usuario&action=editar&usuario_id=<?php echo $usuario->usuario_id ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
    </div>
</div>

<div class="row" style="background: #F8F8F8; border: 1px solid #ededef">
    <div class="col-md-12 text-left" style="margin-bottom: 10px; margin-top: 10px; font-size: 20px">
        <?php echo $usuario->usuario_nombre ?>
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
                        <td style="width: 50%"><?php echo $usuario->usuario_id ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Nombre</p></th>
                        <td style="width: 50%"><?php echo $usuario->usuario_nombre ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Clave</p></th>
                        <td style="width: 50%"><?php echo $usuario->usuario_clave ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Email</p></th>
                        <td style="width: 50%"><?php echo $usuario->usuario_email ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Fecha Registro</p></th>
                        <td style="width: 50%"><?php echo $usuario->usuario_freg ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Nivel Acceso</p></th>
                        <td style="width: 50%"><?php echo $usuario->nivel_acceso ?></td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="text-center mt-3">
            <!--            <a class="btn btn-primary" onclick="history.back()" >Volver</a>-->
        </div>

    </div>

</div>
