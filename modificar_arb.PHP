<?php
if (isset($_GET['id'])) {
    $idArbitro = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM ARBITROS WHERE ID_ARBITRO = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idArbitro);
        $res = oci_execute($stid);

        if ($res) {
            $Arbitro = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($Arbitro) {
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
                    <h1>Editar Arbitro</h1>
                    <form action="guardar_cambios.php" method="post">
                        <input type="hidden" name="arbitro_form" value="1">
                        <input type="hidden" name="ID_ARBITRO" value="<?php echo $Arbitro['ID_ARBITRO']; ?>">
                        
                        <label for="ARB_NOMBRE">Nombre :</label>
                        <input type="text" name="ARB_NOMBRE" value="<?php echo $Arbitro['ARB_NOMBRE']; ?>">

                        <label for="ARB_APELLIDOP">Apellido Paterno:</label>
                        <input type="text" name="ARB_APELLIDOP" value="<?php echo $Arbitro['ARB_APELLIDOP'];?>">

                        <label for="ARB_APELLIDOM">Apellido Materno:</label>
                        <input type="text" name="ARB_APELLIDOM" value="<?php echo $Arbitro['ARB_APELLIDOM'];?>">

                        <label for="ARB_APODO">Apodo:</label>
                        <input type="text" name="ARB_APODO" value="<?php echo $Arbitro['ARB_APODO'];?>">

                        <label for="ARB_FECHA_NAC">Fecha de Nacimiento:</label>
                        <input type="text" name="ARB_FECHA_NAC" value="<?php echo $Arbitro['ARB_FECHA_NAC'];?>">
                        
                        <!-- Campo oculto para indicar que se están modificando jugadores -->
                        <input type="hidden" name="tipo_registro" value="jugadores">

                        <!-- Agregar otros campos para editar aquí -->
                        <input type="submit" value="Guardar cambios">
                    </form>
                </body>
                </html>
                <?php
            } else {
                echo "Arbitro no encontrado.";
            }
        } else {
            echo "Error al obtener datos del arbitro: " . oci_error($conn);
        }

        oci_close($conn);
    }
} else {
    echo "ID de arbitro no especificado.";
}
?>