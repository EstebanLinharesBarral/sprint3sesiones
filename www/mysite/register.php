<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"] ?? '';
        $pswd = $_POST["contraseña"] ?? '';
        $pswd2 = $_POST["contraseña2"] ?? '';
        $name = $_POST["nombre"] ?? '';
        $apellidos = $_POST["apellidos"] ?? '';

        $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
        $query = "SELECT email FROM tUsuarios WHERE email= '". $email . "'";
        $userRes = mysqli_query($db, $query) or die("Error en la consulta.");

        /*COMPROBACIONES*/
        $correcto = true;
        if($pswd != $pswd2 || $email == "" || $pswd == "" || $pswd2 == "" || $name == "" || $apellidos == ""){
            $correcto = false;
        }

        if(mysqli_num_rows($userRes) > 0) {
            $correcto = false;
        }

        /*INSERCIÓN*/
        if($correcto) {
        $passHash = password_hash($pswd, PASSWORD_DEFAULT);
        $insert = $db->prepare("INSERT INTO tUsuarios (nombre, apellidos, email, contraseña) VALUES (?, ?, ?, ?)");
        $insert -> bind_param("ssss", $name, $apellidos, $email, $passHash);
        $insert -> execute();
        $insert -> close();
            header("Location: /main.php");
            exit;
        } else {
            //header("Location: /register.php");
            exit;
        }
        mysqli_close($db);
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>Error al rellenar el formulario</h1>
</body>
</html>