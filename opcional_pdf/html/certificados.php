<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="post" action="pdf.php">     
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido">

        <input type="submit" id="envBut" value="Generar certificado">
    </form>

    <?php if (!empty($errors)): ?>
        <div class="errores">
            <ul>
                <?php foreach ($errors as $e){
                    echo "<li>" . $e . "</li>";
                } 
                ?>
            </ul>
        </div>
    <?php endif; ?>
</body>
</html>