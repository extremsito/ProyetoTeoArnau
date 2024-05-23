<?php
require_once "connectorSQL.php";
session_start();

if (!isset($_SESSION["id_usuari"])) {
    echo "<script>alert('No hi ha id guardada'); location.href = '../login.php';</script>";
    exit; 
}
$id_usuaris = $_SESSION["id_usuari"];
$nombre = $_SESSION['Nom'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$nombreArchivo = $_FILES['curriculum']['name'];
$tipoArchivo = $_FILES['curriculum']['type'];
$tamañoArchivo = $_FILES['curriculum']['size'];
$rutaArchivoTemporal = $_FILES['curriculum']['tmp_name'];


$mysqlSt = "INSERT INTO trabajo (id_usuaris,Nom, Correu, Numtelf, CV) VALUES ('$id_usuaris','$nombre', '$correo', '$telefono', '$nombreArchivo')";

$result = mysqli_query($mysql, $mysqlSt);

if ($result) {
    echo "<script>alert('Propuesta de trabajo insertada correctamente'); location.href = '../contacto.php';</script>";
} else {
    echo "<script>alert('Propuesta de trabajo no insertada'); location.href = '../contacto.php';</script>";
}
?>
