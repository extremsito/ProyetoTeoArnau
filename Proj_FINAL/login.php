<?php
include ("intern/connectorSQL.php");
session_start();
function jsRedirect($url) {
    echo "<script>window.location.href = '$url';</script>";
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nom = addslashes($_POST["Nom"]);
    $password = htmlentities($_POST["password"]);
    $password = md5($password);
    // Realizar una consulta para verificar las credenciales
    $query = "SELECT * FROM usuaris WHERE Nom = '$Nom' AND password = '$password'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        $_SESSION["Nom"] = $usuario["Nom"];
        $_SESSION["Rol_name"] = $usuario["Rol_name"];
        $_SESSION["id_usuari"] = $usuario["id_usuaris"];

        // Redirigir según el rol
        if ($usuario["Rol_name"] == "admin") {
            $_SESSION['authenticated'] = true;
            jsRedirect("admin.php");
        } elseif ($usuario["Rol_name"] == "superpro") {
            $_SESSION['authenticated'] = true;
            jsRedirect("superpro.php");
        } elseif ($usuario["Rol_name"] == "pro") {
            $_SESSION['authenticated'] = true;
            jsRedirect("pro.php");
        } elseif ($usuario["Rol_name"] == "estandar") {
            $_SESSION['authenticated'] = true;
            jsRedirect("estandar.php");
        } else {
            echo "Rol no válido.";
        }
    } else {
        echo "<script>alert('Credenciales incorrectas'); location.href = 'login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inicio de Sesión</title>
    <link rel="icon" type="image/png" href="logo.png">

</head>

<body>
<nav>   
    <h1> <img src="logo.png" height="100px" width="100px"> </h1>
        <ul>
            <a href="login.php">
                <li>Login</li>
            </a>
            <a href="crearcuenta.php">
                <li>Registro</li>
            </a>
        </ul>
    </nav>
    <div class="contenedor">
        <h2>Iniciar Sesión</h2>
        <form method="POST">
            <i class='bx bxs-user-circle'></i>
            <input placeholder="Nombre de usuario" type="text" id="Nom" name="Nom" autocomplete="off" required><br><br>
            <i class='bx bx-key'></i>
            <input placeholder="Password" type="password" id="password" name="password" autocomplete="off"
                required><br><br>
            <input id="enviar" type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>

</html>