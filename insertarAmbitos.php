<!DOCTYPE html>
<html>
    <head>
        <title>Insertar Ambitos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <?php
            require_once 'configdb.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ambitos = isset($_POST['ambito']) ? $_POST['ambito'] : [];
                $numMax = isset($_POST['numMax']);

                if ($numMax > 0 ) {
                    $sql = "INSERT INTO ambitos (nombre) VALUES (?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $ambito);

                    if ($stmt) {
                        foreach ($ambitos as $ambito) {
                            $stmt->execute();
                        }

                        echo "<h3 id='tituloInsertar'>Número de Ámbitos insertados:</h3><br/>";
                        foreach ($ambitos as $index => $ambito) {
                            echo "<p id='insertados'>Ámbito ".($index+1).": ".$ambito."</p><br/>";
                        }

                        $stmt->close();
                    } else {
                        echo "Error en la preparación de la consulta.";
                    }
                } else {
                    echo "Datos no válidos.";
                }

                $conn->close();
            }

            echo "<div id='volverDiv'>";
                echo "<button id='volver'><a href='index.php'>Volver</a></button>";
            echo "</div>";
        ?>
    </body>
</html>
