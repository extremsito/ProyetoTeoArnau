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
        </ul>
    </nav>
    <div class="subscription">
        <h2>Gestión de Incidencias</h2>
            <p>En este panel, usted puede revisar y gestionar todas las incidencias reportadas. Es importante que revise cada una de las incidencias detalladamente para asegurarse de que están correctamente documentadas y resueltas antes de proceder a cerrarlas.</p>
            <p>Revise la lista de incidencias pendientes en mis tickets que puedes entrar en el menú.</p>
            <p>Una vez resuelta, puede cerrar la incidencia utilizando el menú seleccionando solucionar incidencias.</p>
    </div>
</body>