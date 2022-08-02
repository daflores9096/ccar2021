<br>
<div class="row">
    <div class="col-md-6 text-left">
        <h2 class="bd-title">Detalle Proveedor</h2>
    </div>
    <div class="col-md-6 text-right" style="padding-top: 10px">
        <a class="btn btn-warning" onclick="history.back()" ><i class="fas fa-angle-double-left"></i> Volver</a>&nbsp;&nbsp;<a href="./?controller=proveedor&action=editar&cod_pro=<?php echo $proveedor->cod_pro ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>&nbsp;&nbsp;<a href="./?controller=proveedor&action=movimiento&cod_pro=<?php echo $proveedor->cod_pro ?>" class="btn btn-primary"><i class="fas fa-book"></i> Movimiento</a>
    </div>
</div>

<div class="row" style="background: #F8F8F8; border: 1px solid #ededef">
    <div class="col-md-12 text-left" style="margin-bottom: 10px; margin-top: 10px; font-size: 20px">
        <?php echo $proveedor->nom_pro ?>
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
                        <td style="width: 50%"><?php echo $proveedor->cod_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Nombre</p></th>
                        <td style="width: 50%"><?php echo $proveedor->nom_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Contacto Secundario</p></th>
                        <td style="width: 50%"><?php echo $proveedor->contacto_sec ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Dirección</p></th>
                        <td style="width: 50%"><?php echo $proveedor->dire_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Email</p></th>
                        <td style="width: 50%"><?php echo $proveedor->email_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Ciudad</p></th>
                        <td style="width: 50%"><?php echo $proveedor->ciudad_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Teléfono</p></th>
                        <td style="width: 50%"><?php echo $proveedor->tel_pro ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Teléfono Secundario</p></th>
                        <td style="width: 50%"><?php echo $proveedor->tel_sec ?></td>
                    </tr>
                    <tr>
                        <th style="width: 50%"><p>Descripción</p></th>
                        <td style="width: 50%"><?php echo $proveedor->desc_pro ?></td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="text-center mt-3">
            <!--            <a class="btn btn-primary" onclick="history.back()" >Volver</a>-->
        </div>

    </div>

</div>
