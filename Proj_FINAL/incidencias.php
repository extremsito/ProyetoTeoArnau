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
            <a href="login.php"><li>Cerrar sesión</li></a>
            <a href="incidencias.php"><li>Mis tickets</li></a>
            <a href="tickets.php"><li>Solucionar tickets</li></a>            
            <a href="admin.php">
                    <li>Volver</li>
                </a>        </ul>
    </nav>
  
<div class="incidencias">
        <h1>Incidencias</h1>
        <div class="incidencia_mostrar">
        <?php
        require_once "intern/connectorSQL.php";

        $query = "SELECT * FROM incidencias WHERE Estat = 'Ejecucion'";
        $result = mysqli_query($mysql, $query);

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<p><b>Id Incidencia:</b><br> " . $row['id_incidencias'] . "</p>";
            echo "<p><b>Id Usuario:</b><br> " . $row['id_usuaris'] . "</p>";
            echo "<p><b>Estat:</b><br> " . $row['Estat'] . "</p>";
            echo "<p><b>Data de creació:</b><br> " . $row['Data_creacio'] . "</p>";
            echo "<p><b>Descripción:</b><br> " . $row['Descripcio_problema'] . "</p>";
            echo "<br>";
        }
        ?>
        </div>
</div>