<?php  
    require_once 'configdb.php';

    $numMax = 0;
    if(isset($_POST['numMax']) || !empty($_POST['numMax'])) {
        $numMax = $_POST['numMax'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insertar Ambitos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <h2 id="tituloRellenar">Numero de Ambitos seleccionados:</h2>
        <form id="rellenar" method="POST" action="insertarAmbitos.php">
            <?php
                for($i = 0; $i < $numMax; $i++){
                    echo '<label for="ambito'.$i.'">Ambito '.($i+1).':</label>';
                    echo '<input type="text" id="ambito'.$i.'" name="ambito[]" required><br/>';
                }
            ?>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>