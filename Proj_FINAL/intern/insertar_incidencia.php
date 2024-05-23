<?php
require_once "connectorSQL.php";
session_start();

if (!isset($_SESSION["id_usuari"])) {
    echo "<script>alert('No hi ha id guardada'); location.href = '../login.php';</script>";
    exit; 
}

$id_usuaris = $_SESSION["id_usuari"];
$Estat = "Ejecucion";
$Data_creacio = date('Y-m-d'); 
$Descripcio_problema = $_POST["Descripcio_problema"];

$mysqlSt = "INSERT INTO incidencias (id_usuaris, Estat, Data_creacio, Descripcio_problema) VALUES ('$id_usuaris', '$Estat', '$Data_creacio', '$Descripcio_problema')";

$result = mysqli_query($mysql, $mysqlSt);
if ($_SESSION['Rol_name'] == "estandar"){
    if ($result) {
        echo "<script>alert('Incidencia insertada correctamente'); location.href = '../estandar.php';</script>";
    } else {
        echo "<script>alert('Incidencia no insertada'); location.href = '../estandar.php';</script>";
    }
}elseif($_SESSION['Rol_name'] == "pro"){
    if ($result) {
        echo "<script>alert('Incidencia insertada correctamente'); location.href = '../pro.php';</script>";
    } else {
        echo "<script>alert('Incidencia no insertada'); location.href = '../pro.php';</script>";
    }
}elseif($_SESSION['Rol_name'] == "superpro"){
    if ($result) {
        echo "<script>alert('Incidencia insertada correctamente'); location.href = '../pro.php';</script>";
    } else {
        echo "<script>alert('Incidencia no insertada'); location.href = '../pro.php';</script>";
    }
}else
?>
