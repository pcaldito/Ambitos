<!DOCTYPE html>
<html>
    <head>
        <title>Ambitos Insertados</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <?php
            require_once 'configdb.php';

            if(isset($_POST['numMax']) && !empty($_POST['numMax'])) {
                $numMax = $_POST['numMax'];
            } else {
                $numMax = 0;
            }            

            if(isset($_POST['ambito']) && !empty($_POST['ambito'])) {
                $nombreAmbitos = $_POST['ambito']; //Recogemos los ambitos, esto es un array
            }else{
                echo "Error al recoger los ambitos";
            }

            $sql = "INSERT INTO ambitos (nombre) VALUES (?)"; //Consulta sql de insertar
            $stmt = $conn->prepare($sql); //Preparamos la consulta una vez
            $stmt->bind_param("s", $nombreAmbitos); //Parametrizamos solo una vez

            for($i = 0; $i < $numMax; $i++){
                $nombreAmbitos = $nombreAmbitos[$i];
                $stmt->execute(); //Ejecutamos la consulta tantas veces como longitud de array sea
            }

            echo "<h2 id='tituloRellenar'>Ambitos insertados correctamente</h2>";


            echo "<div id='volverDiv'>";
                echo "<button id='volver'><a href='index.php'>Volver</a></button>";
            echo "</div>";
        ?>
    </body>
</html>
