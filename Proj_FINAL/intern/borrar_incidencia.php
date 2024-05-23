<?php
    require_once "connectorSQL.php";

    $id_incidencia = $_POST;
    $mysqlborrar = "DELETE FROM incidencias WHERE id_incidencias = " . $id_incidencia['id_incidencias'];

    echo $mysqlborrar;

    $resultatborrar = mysqli_query($mysql, $mysqlborrar);
    
    echo "<br>";

    if ($resultatborrar) {
        echo "<script>alert('Incidencia finalizada correctamente'); location.href = '../tickets.php';</script>";
    } else {
        echo "<script>alert('Incidencia no finalizada'); location.href = '../tickets.php';</script>";
    }
?>