<?php
if (isset($_GET['id'])) {
    $idEstadio = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM ESTADIOS WHERE ID_ESTADIO = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idEstadio);
        $res = oci_execute($stid);

        if ($res) {
            $Estadio = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($Estadio) {
                // Mostrar un formulario para editar los datos
                ?><!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Arbitro</title>
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

                        form {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 5px;
                            text-align: center;
                        }

                        label {
                            display: block;
                            margin-top: 10px;
                        }

                        input {
                            width: 100%;
                            padding: 10px;
                            margin-top: 5px;
                        }

                        input[type="submit"] {
                            background-color: #333;
                            color: #fff;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                    </style>
                </head>
                <body>
                    <h1>Editar estadios</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="estadio_form" value="1">
                    <input type="hidden" name="ID_ESTADIO" value="<?php echo $Estadio['ID_ESTADIO']; ?>">
                    
                    <label for="EST_NOMBRE">Nombre :</label>
                    <input type="text" name="EST_NOMBRE" value="<?php echo $Estadio['EST_NOMBRE']; ?>">

                    <label for="EST_APODO">APODO :</label>
                    <input type="text" name="EST_APODO" value="<?php echo $Estadio['EST_APODO'];?>">

                    <label for="EST_CAPACIDAD">CAPACIDAD:</label>
                    <input type="text" name="EST_CAPACIDAD" value="<?php echo $Estadio['EST_CAPACIDAD'];?>">
    
                    <label for="EST_PRECIOPROMEDIO_LUGARES">PRECIO PROMEDIO LUGARES:</label>
                    <input type="text" name="EST_PRECIOPROMEDIO_LUGARES" value="<?php echo $Estadio['EST_PRECIOPROMEDIO_LUGARES'];?>">
                    
                    <label for="EST_DIRECCION">DIRECCION:</label>
                    <input type="text" name="EST_DIRECCION" value="<?php echo $Estadio['EST_DIRECCION'];?>">
    
                    <!-- Campo oculto para indicar que se están modificando jugadores -->
                    <input type="hidden" name="tipo_registro" value="jugadores">

                    <!-- Agregar otros campos para editar aquí -->
                    <input type="submit" value="Guardar cambios">
                </form>
                </body>
                </html>
                <?php
            } else {
                echo "jugador no encontrado.";
            }
        } else {
            echo "Error al obtener datos del equipo: " . oci_error($conn);
        }

        oci_close($conn);
    }
} else {
    echo "ID de equipo no especificado.";
}
?>