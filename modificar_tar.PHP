<?php
if (isset($_GET['id'])) {
    $idTarjetaJugador = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM TARJETAS_JUGADORES WHERE ID_TARJETAS_JUG = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idTarjetaJugador);
        $res = oci_execute($stid);

        if ($res) {
            $TarjetaJugador = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($TarjetaJugador) {
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
                    <h1>Editar TARJETAS</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="tarjeta_form" value="1">
                    <input type="hidden" name="ID_TARJETAS_JUG" value="<?php echo $TarjetaJugador['ID_TARJETAS_JUG']; ?>">
                    
                    <label for="ID_PARTIDO">ID_PARTIDO :</label>
                    <input type="text" name="ID_PARTIDO" value="<?php echo $TarjetaJugador['ID_PARTIDO']; ?>">

                    <label for="TARJ_AMARILLAS">TARJETAS AMARILLAS:</label>
                    <input type="text" name="TARJ_AMARILLAS" value="<?php echo $TarjetaJugador['TARJ_AMARILLAS'];?>">

                    <label for="TARJ_ROJAS">TARJETAS ROJAS:</label>
                    <input type="text" name="TARJ_ROJAS" value="<?php echo $TarjetaJugador['TARJ_ROJAS'];?>">
    
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