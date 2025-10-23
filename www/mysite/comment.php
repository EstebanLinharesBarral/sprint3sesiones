<?php
    $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
?>

<html>
    <body>
        <?php
            session_start();
            $user_id_a_insertar = 'NULL';
            if (!empty($_SESSION['user_id'])) {
            $user_id_a_insertar = $_SESSION['user_id'];
            }
            $juego_id = $_POST["juego_id"];
            $comentario = $_POST["Comentario"];

            $fecha = date("Y-m-d");

            $query = $db->prepare("INSERT INTO tComentarios(comentario, juego_id, usuario_id, fecha) values (?, ?, ?, ?)");
            $query->bind_param("siis", $comentario, $juego_id, $user_id_a_insertar, $fecha);
            $query->execute();
            $query->close();

            echo "<p>Nuevo comentario ";
            echo mysqli_insert_id($db);
            echo " añadido</p>";
            echo "<a href='/detail.php?id=".$juego_id."'>Volver</a>";

            mysqli_close($db);
        ?>
    </body>
</html>