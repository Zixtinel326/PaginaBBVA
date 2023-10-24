<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Auxiliares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
        }

        .actions {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listado de AUXILIAR</h1>
    <table class="table table-stripped table-bordered">
        <tr>
            <th>ID_AUX</th>
            <th>AUX_NOMBRE</th>
            <th>AUX_APELLIDOP</th>
            <th>AUX_APELLIDOM</th>
            <th>ID_DT</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Establece la conexión a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            $query = "SELECT * FROM AUXILIAR_TECNICO";
            $stid = oci_parse($conn, $query);

            if (oci_execute($stid)) {
                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID_AUX'] . "</td>";
                    echo "<td>" . $row['AUX_NOMBRE'] . "</td>";
                    echo "<td>" . $row['AUX_APELLIDOP'] . "</td>";
                    echo "<td>" . $row['AUX_APELLIDOM'] . "</td>";
                    echo "<td>" . $row['ID_DT'] . "</td>";
                    echo '<td>';
                    echo '<a href="modificar_aux.php?id=' . $row['ID_AUX'] . '">Modificar</a>';
                    echo ' | ';
                    echo '<a href="eliminar.php?id=' . $row['ID_AUX'] . '&tipo=auxiliar">Eliminar</a>';
                    echo '</td>';
                    echo "</tr>";
                }
            } else {
                echo "Error al ejecutar la consulta: " . oci_error($conn);
            }

            // Cierra la conexión
            oci_close($conn);
        }
        ?>
    </table>
</body>
</html>
