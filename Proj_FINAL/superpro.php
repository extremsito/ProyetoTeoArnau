<?php
session_start();

function jsRedirect($url) {
    echo "<script>window.location.href = '$url';</script>";
    exit();
}
if (!$_SESSION['authenticated']) {
    jsRedirect("login.php");
} elseif (isset($_POST['hidden'])) {
    session_destroy();
    jsRedirect("login.php");
}


if ($_SESSION['Rol_name'] !== "superpro") {
    echo "<script>alert('No eres un cliente superpro'); location.href = 'login.php';</script>";
    session_destroy();
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Client SuperPro</title>
    <link rel="icon" type="image/png" href="logo.png">
</head>

<body>
    <nav>
        <h1> <img src="logo.png" height="100px" width="100px">
            <br>
            Bienvenido
            <?php echo $_SESSION['Nom'] ?><br>
        </h1>
        <ul>
            <a href="login.php">
                <li>Cerrar sesión</li>
            </a>
            <a href="quiensomos.php">
                <li>Quien somos</li>
            </a>
            <a href="contacto.php">
                <li>Contacto</li>
            </a>
            <a href="suscripciones.php">
                <li>Suscripciones</li>
            </a>
            <a href="https://discord.gg/tw9cvtWpAW" target="_blank">
                    
                <li><img src="discord.png" alt="20" width="20">Nuestro Discord</li>
            </a>
        </ul>
    </nav>
    <div class="crear_incidencias">
        <h2>Inserta tu incidencia</h2>
        <form method="POST" action="./intern/insertar_incidencia.php">
            <textarea placeholder="Descripcio del problema" name="Descripcio_problema" id="Descripcio_problema" rows="4"
                required></textarea><br>
            <input id="enviar" type="submit" value="Insertar incidencia">
        </form>
    </div>
    <div class="benefits">
        <h2>Beneficios SuperPro</h2>
            <p>Al ser SuperPro, tenemos el mejor equipo para tus necesidades</p>
            <p>El horario que disponemos al ser superpro es de 24h al dia</p>
            <p>Tienes acceso exclusivo a nuestro discord en el cual podrás aconseguir un asesoramiento muy bueno</p>
            <p>Cualquier duda puede ponerse en contacto con nosotros</p>
    </div>
</body>