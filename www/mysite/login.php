<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["f_email"];
        $pswd = $_POST["f_password"];
        
        $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
        $email_safe = mysqli_real_escape_string($db, $email);
        $query = "SELECT id, contraseña from tUsuarios where email = '" . $email_safe."'";
        $result = mysqli_query($db, $query) or die("Error en la consulta");
        $arrUser = mysqli_fetch_array($result);
        

        $correcto = true;

        if(mysqli_num_rows($result) == 0){
            $correcto = false;
        }

        if(!password_verify($pswd, $arrUser["contraseña"])){
            $correcto = false;
        }

        if($correcto) {
            session_start();
            $_SESSION["user_id"] = $arrUser["id"];
            header("Location: /main.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log error</title>
</head>
<body>
    <h1>Error al logearse</h1>
</body>
</html>