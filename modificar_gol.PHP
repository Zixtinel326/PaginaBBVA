<?php
if (isset($_GET['id'])) {
    $idGol = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM GOLES WHERE ID_GOL = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idGol);
        $res = oci_execute($stid);

        if ($res) {
            $Gol = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($Gol) {
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
                    <h1>Editar goles</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="gol_form" value="1">
                    <input type="hidden" name="ID_GOL" value="<?php echo $Gol['ID_GOL']; ?>">
                    
                    <label for="ID_ESTADISTICA">ID_ESTADISTICA :</label>
                    <input type="text" name="ID_ESTADISTICA" value="<?php echo $Gol['ID_ESTADISTICA']; ?>">

                    <label for="EQUIPO_ANOTADOR">EQUIPO ANOTADOR:</label>
                    <input type="text" name="EQUIPO_ANOTADOR" value="<?php echo $Gol['EQUIPO_ANOTADOR'];?>">

                    <label for="JUGADOR_ANOTADOR">JUGADOR ANOTADOR:</label>
                    <input type="text" name="JUGADOR_ANOTADOR" value="<?php echo $Gol['JUGADOR_ANOTADOR'];?>">
    
                    <label for="MINUTO_ANOTACION">MINUTO ANOTACION:</label>
                    <input type="text" name="MINUTO_ANOTACION" value="<?php echo $Gol['MINUTO_ANOTACION'];?>">
    
                    <!-- Campo oculto para indicar que se están modificando jugadores -->
                    <input type="hidden" name="tipo_registro" value="gol">

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