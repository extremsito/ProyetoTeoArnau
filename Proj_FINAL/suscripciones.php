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

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Suscripciones</title>
    <link rel="icon" type="image/png" href="logo.png">

</head>

<body>

    <?php
    if ($_SESSION['Rol_name'] == "estandar") {


        ?>
        <nav>
             <img src="logo.png" height="100px" width="100px">
                <br>
            <h1>    Bienvenido
                <?php echo $_SESSION['Nom'];
                echo "<h1>Tu suscripción actual es : " . $_SESSION['Rol_name'] . "</h1>";
                ?><br>
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
                <a href="estandar.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
        <div class="subscription">
            <h2>Pro</h2>
            <p>La suscripción Pro ofrece características avanzadas por un precio mensual de 8€.</p>
            <br>
            <p>- Veinte incidencias mensualmente</p>
            <p>- Contacto con los helpdesk de IT de más nivel</p>
            <p>- Prioridad ante incidencias
            <form method="post" action="./intern/updatepro.php">
                <input type="hidden" name="suscripcion" value="pro">
                <input id="enviar" type="submit" value="Seleccionar Pro">
            </form>
        </div>
        <div class="subscription">
            <h2>Super Pro</h2>
            <p>La suscripción Super Pro ofrece todos los beneficios de las suscripciones anteriores y funciones exclusivas
                por un precio de 15€ mensuales.<br><br> Cabe recalcar que hay un plan anual por 120€</p>
            <br>
            <p>- Incidencias ilimitadas mensualmente</p>
            <p>- Acceso a nuestro Discord</p>
            <p>- Contacto directo con los admins</p>

            <form method="post" action="./intern/updatesuperpro.php">
                <input type="hidden" name="suscripcion" value="superpro">
                <input id="enviar" type="submit" value="Seleccionar Super Pro">
            </form>
        </div>
        <?php
    } elseif ($_SESSION['Rol_name'] == "pro") {
        ?>
        <nav>
            <h1> <img src="logo.png" height="100px" width="100px">
                <br>
                Bienvenido
                <?php echo $_SESSION['Nom'];
                echo "<h1>Tu suscripción actual es : " . $_SESSION['Rol_name'] . "</h1>";
                ?><br>
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
                <a href="pro.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
        <div class="subscription">
            <h2>Estándar</h2>
            <p>La suscripción estándar ofrece acceso básico a nuestro servicio y es totalmente gratuita</p>
            <br>
            <p>- Diez incidencias mensualmente</p>
            <p>- Contacto con los helpdesk de IT</p>
            <form method="post" action="./intern/updatestandar.php">
                <input type="hidden" name="suscripcion" value="estandar">
                <input id="enviar" type="submit" value="Seleccionar Estándar">
            </form>
        </div>
        <div class="subscription">
            <h2>Super Pro</h2>
            <p>La suscripción Super Pro ofrece todos los beneficios de las suscripciones anteriores, además de acceso
                exclusivo a contenido premium y funciones exclusivas por un precio de 15€ mensuales.<br><br> Cabe recalcar
                que hay un plan anual por 120€</p>
            <br>
            <p>- Incidencias ilimitadas mensualmente</p>
            <p>- Acceso a nuestro Discord</p>
            <p>- Contacto directo con los admins</p>

            <form method="post" action="./intern/updatesuperpro.php">
                <input type="hidden" name="suscripcion" value="superpro">
                <input id="enviar" type="submit" value="Seleccionar Super Pro">
            </form>
        </div>
        <?php
    } elseif ($_SESSION['Rol_name'] == "superpro") {
        ?>
        <nav>
            <h1> <img src="logo.png" height="100px" width="100px">
                <br>
                Bienvenido
                <?php echo $_SESSION['Nom'];
                echo "<h1>Tu suscripción actual es : " . $_SESSION['Rol_name'] . "</h1>";
                ?><br>
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

        <div class="subscription">
            <h2>Estándar</h2>
            <p>La suscripción estándar ofrece acceso básico a nuestro servicio y es totalmente gratuita</p>
            <br>
            <p>- Diez incidencias mensualmente</p>
            <p>- Contacto con los helpdesk de IT</p>
            <form method="post" action="./intern/updatestandar.php">
                <input type="hidden" name="suscripcion" value="estandar">
                <input id="enviar" type="submit" value="Seleccionar Estándar">
            </form>
        </div>
        <div class="subscription">
            <h2>Pro</h2>
            <p>La suscripción Pro ofrece características avanzadas por un precio mensual de 8€.</p>
            <br>
            <p>- Veinte incidencias mensualmente</p>
            <p>- Contacto con los helpdesk de IT de más nivel</p>
            <p>- Prioridad ante incidencias
            <form method="post" action="./intern/updatepro.php">
                <input type="hidden" name="suscripcion" value="pro">
                <input id="enviar" type="submit" value="Seleccionar Pro">
            </form>
        </div>
        <?php
    } else {
        echo "<script>alert('No eres un suscriptor común'); location.href = 'login.php';</script>";
        session_destroy();
    }
    ?>
</body>

</html>