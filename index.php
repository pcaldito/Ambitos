<!DOCTYPE html>
<html>
    <head>
        <title>Numero de Ambitos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <h2 id="tituloIndex">Numero de Ambitos</h2>
        <form id="numAmbitos" method="POST" action="ambitos.php">
            <label for="num">Numero de Ambitos:</label>
            <input type="number" id="numMax" name="numMax" min="1" max="10" required><br/>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>