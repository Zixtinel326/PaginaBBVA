<?php
if (isset($_GET['id'])) {
    $idPartido = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM PARTIDOS WHERE ID_PARTIDO = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idPartido);
        $res = oci_execute($stid);

        if ($res) {
            $Partido = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($Partido) {
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
                    <h1>Editar PARTIDO</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="partido_form" value="1">
                    <input type="hidden" name="ID_PARTIDO" value="<?php echo $Partido['ID_PARTIDO']; ?>">
                    
                    <label for="PART_JORNADA">JORNADA :</label>
                    <input type="text" name="PART_JORNADA" value="<?php echo $Partido['PART_JORNADA']; ?>">

                    <label for="PART_EQUIPO_LOCAL">EQUIPO LOCAL:</label>
                    <input type="text" name="PART_EQUIPO_LOCAL" value="<?php echo $Partido['PART_EQUIPO_LOCAL'];?>">

                    <label for="PART_EQUIPO_VISITANTE">EQUIPO VISITANTE:</label>
                    <input type="text" name="PART_EQUIPO_VISITANTE" value="<?php echo $Partido['PART_EQUIPO_VISITANTE'];?>">
    
                    <label for="PART_FECHA_PARTIDO">FECHA_PARTIDO:</label>
                    <input type="text" name="PART_FECHA_PARTIDO" value="<?php echo $Partido['PART_FECHA_PARTIDO'];?>">
                    
                    <label for="ID_ARBITRO">ID_ARBITRO:</label>
                    <input type="text" name="ID_ARBITRO" value="<?php echo $Partido['ID_ARBITRO'];?>">
    
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