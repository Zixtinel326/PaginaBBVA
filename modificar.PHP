<?php
if (isset($_GET['id'])) {
    $idEquipo = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM EQUIPOS WHERE ID_EQUIPO = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idEquipo);
        $res = oci_execute($stid);

        if ($res) {
            $equipo = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($equipo) {
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
                    <h1>Editar EQUIPOS</h1>
                <form action="guardar_cambios.php" method="post">
                    <input type="hidden" name="equipo_form" value="1">
                    <input type="hidden" name="ID_EQUIPO" value="<?php echo $equipo['ID_EQUIPO']; ?>">
                    
                    <label for="EQ_NOMBRE">Nombre del equipo:</label>
                    <input type="text" name="EQ_NOMBRE" value="<?php echo $equipo['EQ_NOMBRE']; ?>">

                    <label for="EQ_APODO">Apodo:</label>
                    <input type="text" name="EQ_APODO" value="<?php echo $equipo['EQ_APODO'];?>">

                    <label for="EQ_DIRECCION">Dirección:</label>
                    <input type="text" name="EQ_DIRECCION" value="<?php echo $equipo['EQ_DIRECCION'];?>">
    
                    <label for="EQ_FECHA_FUNDACION">Fecha de Fundación:</label>
                    <input type="text" name="EQ_FECHA_FUNDACION" value="<?php echo $equipo['EQ_FECHA_FUNDACION'];?>">
    
                     <label for="ID_ESTADIO">ID del Estadio:</label>
                    <input type="text" name="ID_ESTADIO" value="<?php echo $equipo['ID_ESTADIO'];?>">
                    
                    <!-- Campo oculto para indicar que se están modificando equipos -->
                    <input type="hidden" name="tipo_registro" value="equipos">

                    <!-- Agregar otros campos para editar aquí -->
                    <input type="submit" value="Guardar cambios">
                </form>
                </body>
                </html>
                <?php
            } else {
                echo "Equipo no encontrado.";
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
