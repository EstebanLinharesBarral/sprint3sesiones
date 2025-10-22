<!DOCTYPE html>
<?php
    $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis juegos favoritos</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <?php
        $id = $_GET["id"];
        $datosJuego = "Select * from tJuegos where id = " . $_GET["id"];
        $resultJuego = mysqli_query($db, $datosJuego) or die("Query error");
        while($juego = mysqli_fetch_array($resultJuego)) {
            echo "<section>";
            echo "<h1>" . $juego["nombre"] . "</h1>";
            echo "<a id='logout' href='/logout.php'>Logout</a>";
            echo "<figure ><img src='" . $juego["url_imagen"] . "' alt ='" . $juego["nombre"] . "'></figure>";
            echo "<article><h3>Género</h3>";
            echo "<p>" . $juego["genero"] . "</p></article>";
            echo "<article><h3>Desarrolladora</h3>";
            echo "<p>" . $juego["desarrolladora"] . "</p></article>";
            echo "</section>";
        }
        
        echo "<div class ='comentarios'>";
        echo "<h3>Comentarios</h3>";
        $datosComentario = "Select * from tComentarios where juego_id = " . $_GET["id"];
        $resultComentario = mysqli_query($db, $datosComentario) or die("Query Error");
        while($comentario = mysqli_fetch_array($resultComentario)){
            echo "<p>" . $comentario["comentario"] . " - " . $comentario["fecha"] . "</p>";
        }
        echo "</div>";
    ?>

    <p>Deja un nuevo comentario:</p>
    <form action="/comment.php" method="post">
        <textarea rows="4" cols="50" name="Comentario"></textarea><br>
        <input type="hidden" name="juego_id" value="<?php echo $id;?>">
        <input type="submit" value="Comentar">
    </form>
    
    <br>

    <a href='/main.php'>Volver al inicio</a>
</body>
</html>