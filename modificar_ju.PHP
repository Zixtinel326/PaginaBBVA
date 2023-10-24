<?php
if (isset($_GET['id'])) {
    $idJugador = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM jugador WHERE ID_JUGADOR = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idJugador);
        $res = oci_execute($stid);

        if ($res) {
            $jugador = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($jugador) {
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
                    <h1>Editar JUGADORES</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="jugador_form" value="1">
                    <input type="hidden" name="ID_JUGADOR" value="<?php echo $jugador['ID_JUGADOR']; ?>">
                    
                    <label for="JUG_NOMBRE">Nombre del equipo:</label>
                    <input type="text" name="JUG_NOMBRE" value="<?php echo $jugador['JUG_NOMBRE']; ?>">

                    <label for="JUG_APELLIDOP">APELLIDOP:</label>
                    <input type="text" name="JUG_APELLIDOP" value="<?php echo $jugador['JUG_APELLIDOP'];?>">

                    <label for="JUG_APELLIDOM">APELLIDOM:</label>
                    <input type="text" name="JUG_APELLIDOM" value="<?php echo $jugador['JUG_APELLIDOM'];?>">
    
                    <label for="JUG_APODO">APODO:</label>
                    <input type="text" name="JUG_APODO" value="<?php echo $jugador['JUG_APODO'];?>">
    
                     <label for="JUG_NACIONALIDAD">NACIONALIDAD:</label>
                    <input type="text" name="JUG_NACIONALIDAD" value="<?php echo $jugador['JUG_NACIONALIDAD'];?>">
                    
                    <label for="JUG_DORSAL">DORSAL:</label>
                    <input type="text" name="JUG_DORSAL" value="<?php echo $jugador['JUG_DORSAL'];?>">
                    
                    <label for="JUG_POSICION">POSICION:</label>
                    <input type="text" name="JUG_POSICION" value="<?php echo $jugador['JUG_POSICION'];?>">
                    
                    <label for="JUG_PRECIO_MERCADO">PRECIO MERCADO:</label>
                    <input type="text" name="JUG_PRECIO_MERCADO" value="<?php echo $jugador['JUG_PRECIO_MERCADO'];?>">
                    
                    <label for="ID_DT">ID_DT:</label>
                    <input type="text" name="ID_DT" value="<?php echo $jugador['ID_DT'];?>">
                    
                    
                    <label for="JUG_FECHA_NACIMIENTO">FECHA_NACIMIENTO:</label>
                    <input type="text" name="JUG_FECHA_NACIMIENTO" value="<?php echo $jugador['JUG_FECHA_NACIMIENTO'];?>">
                    
                    
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
