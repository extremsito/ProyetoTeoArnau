<?php
include ("intern/connectorSQL.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Nom"]) && isset($_POST["Correu"]) && isset($_POST["password"])) {
        $Nom = $_POST["Nom"];
        $Correu = $_POST["Correu"];
        $password = $_POST["password"];
        $password = md5($password);

        $Rol_name = "estandar";
        $Tipus = "Client";

        $sql = "INSERT INTO usuaris (Rol_name, Nom, password, Tipus, Correu) VALUES ('$Rol_name', '$Nom', '$password', '$Tipus', '$Correu')";

        $result = mysqli_query($mysql, $sql);
        if (!$result) {
            echo "<script>alert Error al ejecutar la consulta: " . "mysqli_error($mysql)</script>";
        } else {
            echo "<script>alert Usuario creado exitosamente. </script>";
        }
    } else {
        echo "<script>alert Por favor, complete todos los campos del formulario. </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Crear Cuenta</title>
    <link rel="icon" type="image/png" href="logo.png">

</head>

<body>
    <nav>
    <h1> <img src="logo.png" height="100px" width="100px"> </h1>
        <ul>
            <a href="login.php">
                <li>Login</li>
            </a>
            <a href="crearcuenta.php">
                <li>Registro</li>
            </a>
        </ul>
    </nav>
    <div class="contenedor">
        <div class="titulo">
            <h2>Crear Usuario</h2>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nombre: <input type="text" name="Nom" pattern="[A-Za-z ]+" title="No se puede poner numeros" required autocomplete="off"><br>
            Email: <input type="text" name="Correu" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required autocomplete="off"><br>
            Contraseña: <input type="password" name="password" required autocomplete="off"><br>
            <input type="submit" value="Crear Usuario">
        </form>
    </div>
</body>

</html>