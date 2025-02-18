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

        if (isset($_POST['ambito']) && !empty($_POST['ambito'])) {
            $nombreAmbitos = $_POST['ambito']; // Recogemos los ámbitos (array)
        } else {
            die("Error al recoger los ámbitos.");
        }

        // Crear la conexión
        $conn = new mysqli($host, $usuario, $pw, $db);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        foreach ($nombreAmbitos as $ambito) {
            // Comprobar si ya existe en la base de datos
            $sqlCheck = "SELECT nombre FROM ambitos WHERE nombre = '$ambito'";
            $result = $conn->query($sqlCheck);

            if ($result->num_rows > 0) {
                echo "<p style='color:red;'>Error: El ámbito '$ambito' ya existe.</p>";
            } else {
                // Insertar si no existe
                $sqlInsert = "INSERT INTO ambitos (nombre) VALUES ('$ambito')";
                if ($conn->query($sqlInsert) === TRUE) {
                    echo "<p style='color:green;'>Ámbito '$ambito' insertado correctamente.</p>";
                } else {
                    echo "<p style='color:red;'>Error al insertar '$ambito': " . $conn->error . "</p>";
                }
            }
        }

        // Cerrar conexión
        $conn->close();

        echo "<div id='volverDiv'>";
        echo "<button id='volver'><a href='index.php'>Volver</a></button>";
        echo "</div>";

    ?>

    </body>
</html>
