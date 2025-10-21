<?php
    $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
?>

<html>
    <body>
        <?php
            $juego_id = $_POST["juego_id"];
            $comentario = $_POST["Comentario"];

            $fecha = date("Y-m-d");

            $query = "INSERT INTO tComentarios(comentario, juego_id, usuario_id, fecha) values ('". $comentario . "', '". $juego_id . "', NULL, '" . $fecha ."')";
            mysqli_query($db, $query) or die("Error al insertar el comentario.");

            echo "<p>Nuevo comentario ";
            echo mysqli_insert_id($db);
            echo " añadido</p>";
            echo "<a href='/detail.php?id=".$juego_id."'>Volver</a>";

            mysqli_close($db);
        ?>
    </body>
</html>