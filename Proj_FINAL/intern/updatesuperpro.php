<?php
require_once "connectorSQL.php";
session_start();

if (!isset($_SESSION["id_usuari"])) {
    echo "<script>alert('No hi ha id guardada'); location.href = '../login.php';</script>";
    exit; 
}
$id_usuaris = $_SESSION["id_usuari"];
$Rol_name = "superpro";
$_SESSION["Rol_name"] = "superpro";
$mysqlupdaterol = "UPDATE usuaris SET Rol_name = '$Rol_name' WHERE id_usuaris = '$id_usuaris'" ;

$resultatupdate = mysqli_query($mysql, $mysqlupdaterol);

if ($resultatupdate) {
    echo "<script>alert('Rol actualizado correctamente'); location.href = '../superpro.php';</script>";
}

?>