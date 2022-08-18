<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales & Inventory</title>
    <!-- CSS only -->
    <link href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- DataTables-->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/chosen.css">
    <script src="js/chosen.jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" href="./assets/estilos.css"/>

    <style>
        body {
            /*min-height: auto;*/
            padding-top: 40px;
        }

        .loader-background {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: white;
        }

        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>

    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.visibility = "hidden";
                document.querySelector("#loader").style.visibility = "visible";
            } else {
                document.querySelector(".loader-background").style.display = "none";
                document.querySelector("#loader").style.display = "none";
                document.querySelector("body").style.visibility = "visible";
            }
        };
    </script>
</head>
<body>
<div class="loader-background">
    <div id="loader" class="center"></div>
</div>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><img src="./assets/img/carioca_logo_bn.jpg" alt="Carioca" style="width: 85px; margin-top: -13px;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./?controller=products&action=lista"> Lista de Productos</a></li>
                        <li><a href="./?controller=inventarios&action=lista"> Inventario Físico</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Movimientos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./?controller=compras&action=lista">Compras</a></li>
                        <li><a href="./?controller=ventas&action=lista">Ventas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contactos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./?controller=proveedor&action=lista">Proveedores</a></li>
                        <li><a href="./?controller=cliente&action=lista">Clientes</a></li>
                    </ul>
                </li>
                <?php
                if ($_SESSION['access'] == 1){
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./?controller=usuario&action=lista">Usuarios</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
<!--                <li><a href="../navbar/">Default</a></li>-->
                <li><span class="navbar-text">
                    <strong>Bienvenido <?php echo $_SESSION['username'] ?></strong>
                </span></li>
                <li class="active"><a href="./logout.php">Cerrar sesi&oacute;n <span class="sr-only">(current)</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <br>
    <br>
    <?php //var_dump($_SESSION); ?>
    <div class="row">
        <div class="col-12">
        <?php
        include_once "router.php";
        ?>
        </div>

    </div>

</div>
<script src="https://getbootstrap.com/docs/3.4/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
