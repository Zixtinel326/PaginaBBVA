<?php
if (isset($_GET['id'])) {
    $idAuxiliar = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM AUXILIAR_TECNICO WHERE ID_AUX = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idAuxiliar);
        $res = oci_execute($stid);

        if ($res) {
            $auxiliar = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($auxiliar) {
                // Mostrar un formulario para editar los datos
                ?>
                                <!DOCTYPE html>
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
                    <h1>Editar Auxiliar</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="auxiliar_tecnico_form" value="1">
                    <input type="hidden" name="ID_AUX" value="<?php echo $auxiliar['ID_AUX']; ?>">
                    
                    <label for="AUX_NOMBRE">Nombre :</label>
                    <input type="text" name="AUX_NOMBRE" value="<?php echo $auxiliar['AUX_NOMBRE']; ?>">

                    <label for="AUX_APELLIDOP">Apellido Paterno:</label>
                    <input type="text" name="AUX_APELLIDOP" value="<?php echo $auxiliar['AUX_APELLIDOP'];?>">

                    <label for="AUX_APELLIDOM">Apellido Materno:</label>
                    <input type="text" name="AUX_APELLIDOM" value="<?php echo $auxiliar['AUX_APELLIDOM'];?>">
    
                    <label for="ID_DT">ID_DT:</label>
                    <input type="text" name="ID_DT" value="<?php echo $auxiliar['ID_DT'];?>">
    
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
