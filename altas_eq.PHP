<?php


$ID_EQUIPO = $_POST["ID_EQUIPO"];
$EQ_NOMBRE = $_POST["EQ_NOMBRE"];
$EQ_APODO = $_POST["EQ_APODO"];
$EQ_DIRECCION = $_POST["EQ_DIRECCION"];
$EQ_FECHA_FUNDACION = $_POST["EQ_FECHA_FUNDACION"];
$ID_ESTADIO = $_POST["ID_ESTADIO"];

// Definir la consulta SQL
$query = "INSERT INTO EQUIPOS(ID_EQUIPO, EQ_NOMBRE, EQ_APODO, EQ_DIRECCION, EQ_FECHA_FUNDACION, ID_ESTADIO) 
          VALUES ('$ID_EQUIPO', '$EQ_NOMBRE', '$EQ_APODO', '$EQ_DIRECCION',TO_DATE('$EQ_FECHA_FUNDACION', 'YYYY-MM-DD'), '$ID_ESTADIO')";

// Establecer la conexión a la base de datos
$conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

if (!$conn) {
    echo "No se pudo conectar a la base de datos: " . oci_error();
} else {
    // Ejecutar la consulta
    $stid = oci_parse($conn, $query);
    $res = oci_execute($stid);

    if ($res) {
        // Datos insertados correctamente
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Éxito</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
                    margin: 0;
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                h1 {
                    background-color: #333;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-align: center;
                }

                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <h1>Datos insertados correctamente</h1>
            <p>Redireccionando en 3 segundos...</p>
        </body>
        </html>';

        echo '<meta http-equiv="refresh" content="3;url=INSERTAR_ARBITRO.php">'; // Redirige después de 3 segundos
    } else {
        // Error al insertar los datos
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
                    margin: 0;
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                h1 {
                    background-color: #333;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-align: center;
                }

                p {
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
            <h1>Error al insertar los datos</h1>
            <p>' . oci_error($conn) . '</p>
            <p>Redireccionando en 3 segundos...</p>
        </body>
        </html>';
        
        echo '<meta http-equiv="refresh" content="3;url=INSERTAR_ARBITRO.php">'; // Redirige después de 3 segundos
    }

    // Cerrar la conexión
    oci_close($conn);
}
?>
