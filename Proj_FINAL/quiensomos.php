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


if ($_SESSION['Rol_name'] == "admin") {
    echo "<script>alert('No tendrias que ver esto admin...'); location.href = 'login.php';</script>";
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
    <title>Quienes somos</title>
    <link rel="icon" type="image/png" href="logo.png">
</head>

<body>
    <?php if ($_SESSION['Rol_name'] == "estandar") {


        ?>
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
                <a href="superpro.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
        <?php
    } elseif ($_SESSION['Rol_name'] == "pro") {


        ?>
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
                <a href="superpro.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
    <?php
    } elseif ($_SESSION['Rol_name'] == "superpro") {

        ?>
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
                <a href="superpro.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
        <?php
    } else {
        echo "<script>alert('No eres un suscriptor común'); location.href = 'login.php';</script>";
        session_destroy();
    }
    ?>

    <div class="explicacionempresa">
        <h1>INFOSEC EXPERTS</h1>
        <h3>INFOSEC EXPERTS es una empresa líder en el campo de la ciberseguridad. Nos especializamos en proteger la
            infraestructura digital de nuestros clientes contra amenazas cibernéticas.</h3>
        <img src="quiensomos1.jpeg">
        <h3>Nuestros servicios incluyen consultoría en ciberseguridad, pruebas de penetración, monitoreo y detección de
            amenazas, implementación de medidas de seguridad y formación y capacitación en ciberseguridad.</h3>
        <img src="quiensomos2.jpeg">
        <h3>Nuestra misión es proporcionar soluciones innovadoras y personalizadas que se adapten a las necesidades
            específicas de cada cliente. Nos comprometemos a mantenernos actualizados con las últimas tendencias y
            tecnologías en ciberseguridad para garantizar la máxima protección.</h3>
        <img src="quiensomos3.jpeg">
        <h3>En INFOSEC EXPERTS, nuestro equipo de expertos altamente calificados está dedicado a ayudar a nuestros
            clientes a enfrentar los desafíos de seguridad digital en un mundo cada vez más conectado.</h3>
        <img src="quiensomos4.jpeg">
        <h3>¡Confíe en INFOSEC EXPERTS para proteger su negocio y su información sensible contra las amenazas
            cibernéticas!</h3>
    </div>

    <body>