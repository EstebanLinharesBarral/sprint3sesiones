<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $vieja = $_POST["viejaPass"];
        $nueva = $_POST["nuevaPass"];
        $nueva2 = $_POST["nuevaPass2"];
        $id = $_SESSION["user_id"];

        $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
        $pass = "Select contraseña from tUsuarios where id = " . $id;
        $result = mysqli_fetch_array(mysqli_query($db, $pass));

        $correcto = true;

        if($nueva != $nueva2){
            $correcto = false;
        }
        if(!password_verify($vieja, $result["contraseña"]) || password_verify($nueva, $result["contraseña"]) ){
            $correcto = false;
        }

        if($correcto){
            $passHash= password_hash($nueva, PASSWORD_DEFAULT);
            $update = $db->prepare("update tUsuarios set contraseña= ? where id= ? ");
            $update->bind_param("si", $passHash, $id);
            $update->execute();
            $update->close();
            mysqli_query($db, $update) or die("Error al cambiar la contraseña");
            header("Location: /main.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error al cambiar</title>
</head>
<body>
    <h1>Error al cambiar la contraseña</h1>
</body>
</html>