<!DOCTYPE html>
    <?php
        $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die ("Fail");
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis juegos favoritos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Mis juegos favoritos</h1>
    <section>
        <?php 
            $query = "Select * from tJuegos";
            $result = mysqli_query($db, $query) or die("Query error");
            while($juego = mysqli_fetch_array($result)) {
                echo "<a href='/detail.php?id=" . $juego["id"] . "'>";
                echo "<article>";
                echo "<p>" . $juego["nombre"] . "</p>";
                echo "<figure ><img src='" . $juego["url_imagen"] . "' alt ='" . $juego["nombre"] . "'></figure>";
                echo "<p>" . $juego["genero"] . "</p>";
                echo "<p>" . $juego["desarrolladora"] . "</p>";
                echo "</article>";
                echo "</a>";
            }
            mysqli_close($db);
            ?>
    </section>
</body>
</html>