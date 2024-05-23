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

if ($_SESSION['Rol_name'] !== "admin") {
    echo "<script>alert('No eres admin'); location.href = 'login.php';</script>";
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
    <title>Admin</title>
    <link rel="icon" type="image/png" href="logo.png">

</head>

<body>
    <nav>
    <h1> <img src="logo.png" height="100px" width="100px">
            Bienvenido
            <?php echo $_SESSION['Nom'] ?>
        </h1>  

        <ul>
            <a href="login.php">
                <li>Cerrar sesión</li>
            </a>
            <a href="incidencias.php">
                <li>Mis tickets</li>
            </a>
            <a href="tickets.php">
                <li>Solucionar tickets</li>
            </a>
            <a href="admin.php">
                <li>Volver</li>
            </a>
        </ul>
    </nav>

    <div class="solucionar_incidencias">
        <h2>Formulario de Edicion</h2>
        <div class="incidencia_finalizar">
            <form action="./intern/borrar_incidencia.php" method="post">
                <label for="id_incidencias">Id Incidencia:</label>
                <select name="id_incidencias" id="id_incidencias">
                    <?php
                    require_once "./intern/connectorSQL.php";
                    $sql = "SELECT * FROM incidencias WHERE Estat = 'Ejecucion'";
                    $result = mysqli_query($mysql, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<option value='" . $row['id_incidencias'] . "'>" . $row['id_incidencias'] . ". ";
                        echo "<value='" . $row['Descripcio_problema'] . "'>" . $row['Descripcio_problema'] . ". ";
                    }
                    ?>
                </select><br>
                <label for="Descripcio_problema">Que has hecho para solucionarlo?:</label>
                <textarea placeholder="Solución..." name="Descripcio_problema" id="Descripcio_problema" rows="4"
                    required></textarea><br>

                <input type="submit" value="Finalizar incidencia"> <br>
        </div>
        </form>
    </div>
</body>

</html>