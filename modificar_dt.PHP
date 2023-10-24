<?php


if (isset($_GET['id'])) {
    $idDT = $_GET['id'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    if (!$conn) {
        echo "No se pudo conectar a la base de datos: " . oci_error();
    } else {
        // Consulta SQL para obtener los datos actuales del equipo
        $query = "SELECT * FROM DT WHERE ID_DT = :id";
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $idDT);
        $res = oci_execute($stid);

        if ($res) {
            $dt = oci_fetch_assoc($stid); // Recuperar datos del equipo

            if ($dt) {
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
                    <h1>Editar DT</h1>
                <form action="guardar_cambios.php" method="post">
                <input type="hidden" name="dt_form" value="1">
                <input type="hidden" name="ID_DT" value="<?php echo $dt['ID_DT']; ?>">

                <label for="DT_NOMBRE">Nombre del DT:</label>
                <input type="text" name="DT_NOMBRE" value="<?php echo $dt['DT_NOMBRE']; ?>">

                <label for="DT_APELLIDOP">Apellido Paterno:</label>
                <input type="text" name="DT_APELLIDOP" value="<?php echo $dt['DT_APELLIDOP']; ?>">

                <label for="DT_APELLIDOM">Apellido Materno:</label>
                <input type="text" name="DT_APELLIDOM" value="<?php echo $dt['DT_APELLIDOM']; ?>">

                <label for="DT_APODO">Apodo:</label>
                <input type="text" name="DT_APODO" value="<?php echo $dt['DT_APODO']; ?>">

                <label for="DT_FECHA_NAC">Fecha de Nacimiento:</label>
                <input type="text" name="DT_FECHA_NAC" value="<?php echo $dt['DT_FECHA_NAC']; ?>">

                <label for="DT_NACIONALIDAD"><p></p>Nacionalidad:</label>
                <input type="text" name="DT_NACIONALIDAD" value="<?php echo $dt['DT_NACIONALIDAD']; ?>">

    
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
