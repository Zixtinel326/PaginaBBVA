<?php
if (isset($_GET['id'])) {
    $idEstadistica = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM ESTADISTICAS WHERE ID_ESTADISTICA = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idEstadistica);
        $res = oci_execute($stid);

        if ($res) {
            $Estadistica = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($Estadistica) {
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
                    <h1>Editar Estadisticas</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="estadistica_form" value="1">
                    <input type="hidden" name="ID_ESTADISTICA" value="<?php echo $Estadistica['ID_ESTADISTICA']; ?>">
                    
                    <label for="ETD_GOLES_L">ETD_GOLES_L :</label>
                    <input type="text" name="ETD_GOLES_L" value="<?php echo $Estadistica['ETD_GOLES_L']; ?>">

                    <label for="ETD_GOLES_V">ETD_GOLES_V:</label>
                    <input type="text" name="ETD_GOLES_V" value="<?php echo $Estadistica['ETD_GOLES_V'];?>">

                    <label for="ETD_TIROS_ARCO_L">ETD_TIROS_ARCO_L:</label>
                    <input type="text" name="ETD_TIROS_ARCO_L" value="<?php echo $Estadistica['ETD_TIROS_ARCO_L'];?>">
    
                    <label for="ETD_POSESION_L">ETD_POSESION_L:</label>
                    <input type="text" name="ETD_POSESION_L" value="<?php echo $Estadistica['ETD_POSESION_L'];?>">
    
                    
                    <label for="ETD_POSESION_V">ETD_POSESION_V:</label>
                    <input type="text" name="ETD_POSESION_V" value="<?php echo $Estadistica['ETD_POSESION_V'];?>">
    
                    <label for="ID_PARTIDO">ID_PARTIDO:</label>
                    <input type="text" name="ID_PARTIDO" value="<?php echo $Estadistica['ID_PARTIDO'];?>">

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