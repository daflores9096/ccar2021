<?php
include_once "models/login.php";
include_once "conexion.php";

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php?controller=pages&action=inicio");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){

        // Set parameters
        $param_username = $username;
        $hashed_password = md5($password);
        BD::crearInstancia();
        $usuario = Login::getUserData($param_username,$password);

        if (!is_null($usuario)){
            //if(password_verify($password, $hashed_password)){
            if(verificar_password($usuario['usuario_clave'], $hashed_password)){
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $usuario['usuario_id'];
                $_SESSION["username"] = $usuario['usuario_nombre'];
                $_SESSION["usermail"] = $usuario['usuario_email'];
                $_SESSION["access"] = $usuario['nivel_acceso'];

                // Redirect user to welcome page
                header("location: index.php?controller=pages&action=inicio");
            } else{
                // Password is not valid, display a generic error message
                $login_err = "Usuario o contraseña incorrectos.";
            }
        } else {
            // Username doesn't exist, display a generic error message
            $login_err = "Usuario o contraseña incorrectos.";
        }
    }

    // Close connection
    mysqli_close($link);
}

function verificar_password($passdb, $passhash){

    if ($passdb == $passhash){
        return true;
    } else {
        return false;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 460px; padding: 20px; }
    </style>
</head>
<body>
<link href="assets/login.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
    <div class="card card-container" style="max-width: 380px">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required autofocus>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
            <?php
            if ($login_err){
            ?>
            <div id="err_msg" class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $login_err ?>
            </div>
            <script>
                $(document).ready(function(){
                    $("#err_msg").delay(3000).fadeOut(500);
                });
            </script>
            <?php
            }
            ?>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar sesión</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Recuperar contraseña
        </a>
    </div><!-- /card-container -->
</div>

</body>
</html>
