<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
} elseif (isset($_POST['hidden'])) {
    session_destroy();
    header("Location: login.php");
}

if ($_SESSION['Rol_name'] == "admin") {
    echo "<script>alert('No tendrias que ver esto admin...'); location.href = '../Proj FINAL/login.php';</script>";
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
    <title>Contacto</title>
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
                <a href="../Proj FINAL/login.php">
                    <li>Cerrar sesión</li>
                </a>
                <a href="../Proj FINAL/quiensomos.php">
                    <li>Quien somos</li>
                </a>
                <a href="../Proj FINAL/contacto.php">
                    <li>Contacto</li>
                </a>
                <a href="../Proj FINAL/suscripciones.php">
                    <li>Suscripciones</li>
                </a>
                <a href="../Proj FINAL/superpro.php">
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
                <a href="../Proj FINAL/login.php">
                    <li>Cerrar sesión</li>
                </a>
                <a href="../Proj FINAL/quiensomos.php">
                    <li>Quien somos</li>
                </a>
                <a href="../Proj FINAL/contacto.php">
                    <li>Contacto</li>
                </a>
                <a href="../Proj FINAL/suscripciones.php">
                    <li>Suscripciones</li>
                </a>
                <a href="../Proj FINAL/superpro.php">
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
                <a href="../Proj FINAL/login.php">
                    <li>Cerrar sesión</li>
                </a>
                <a href="../Proj FINAL/quiensomos.php">
                    <li>Quien somos</li>
                </a>
                <a href="../Proj FINAL/contacto.php">
                    <li>Contacto</li>
                </a>
                <a href="../Proj FINAL/suscripciones.php">
                    <li>Suscripciones</li>
                </a>
                <a href="https://discord.gg/tw9cvtWpAW" target="_blank">

                    <li><img src="discord.png" alt="20" width="20">Nuestro Discord</li>
                </a>
                <a href="../Proj FINAL/superpro.php">
                    <li>Volver</li>
                </a>
            </ul>
        </nav>
        <?php
    } else {
        echo "<script>alert('No eres un suscriptor común'); location.href = '../Proj FINAL/login.php';</script>";
        session_destroy();
    }
    ?>
    <div class="contacto">
        <h1>Contacto</h1>
        <div class="info">
            <h2>Dirección:</h2>
            <p>[Calle del Doctor Almera, 33]</p>
            <p>[Sabadell, 08202]</p>
            <p>[España]</p>

            <h2>Teléfono:</h2>
            <p>Principal: [671374010]</p>
            <p>Secundario: [Número de Teléfono Secundario]</p>

            <h2>Correo Electrónico:</h2>
            <p>Personal: <a href="mailto:docach@jviladoms.cat" target="blank">docach@jviladoms.cat</a></p>
            <p>Soporte: <a href="mailto:infosecexpertsjv@gmail.com" target="blank">infosecexpertsjv@gmail.com</a>
            </p>

            <h2>Horario de Atención:</h2>
            <p>Lunes a Viernes: 9:00 AM - 5:00 PM</p>
        </div>

        <!-- Aquí puedes insertar el mapa de Google Maps -->
        <div class="mapa">
            <h2>Donde estamos ubicados?:<br><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1721.8080710223826!2d2.0987529154011693!3d41.54411401959618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a494f7a6b86651%3A0xe9a74531a2b7ca1!2sJaume%20Viladoms%2C%20Centro%20de%20Estudios%20Profesionales!5e0!3m2!1ses!2ses!4v1715673220044!5m2!1ses!2ses"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe></h2>
        </div>
    </div>
    <div class="Solicitudempleo">
        <h2>Quieres trabajar con nosotros?</h2>
        <form  method="post" action="./intern/procesar_formulario.php" enctype="multipart/form-data">
            
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>

            <label for="curriculum">Currículum Vitae:</label>
            <input type="file" id="curriculum" name="curriculum" accept=".pdf,.doc,.docx" required><br><br>

            <input id="enviar" type="submit" value="Enviar solicitud">
        </form>
    </div>
</body>

</html>