<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Eq</title>
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
    <h1>Listado de ESTADISTICAS</h1>
    <table class="table table-stripped table-bordered">
        <tr>
            <th>ID_ESTADISTICA</th>
            <th>ETD_GOLES_L</th>
            <th>ETD_GOLES_V</th>
            <th>ETD_TIROS_ARCO_L</th>
            <th>ETD_TIROS_ARCO_V</th>
            <th>ETD_POSESION_L</th>
            <th>ETD_POSESION_V</th>
            <th>ID_PARTIDO</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Establece la conexión a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            $query = "SELECT * FROM ESTADISTICAS";
            $stid = oci_parse($conn, $query);

            if (oci_execute($stid)) {
                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID_ESTADISTICA'] . "</td>";
                    echo "<td>" . $row['ETD_GOLES_L'] . "</td>";
                    echo "<td>" . $row['ETD_GOLES_V'] . "</td>";
                    echo "<td>" . $row['ETD_TIROS_ARCO_L'] . "</td>";
                    echo "<td>" . $row['ETD_TIROS_ARCO_V'] . "</td>";
                    echo "<td>" . $row['ETD_POSESION_L'] . "</td>";
                    echo "<td>" . $row['ETD_POSESION_V'] . "</td>";
                    echo "<td>" . $row['ID_PARTIDO'] . "</td>";
                    echo '<td>';
                    echo '<a href="modificar_estadisticas.php?id=' . $row['ID_ESTADISTICA'] . '">Modificar</a>';
                    echo ' | ';
                    echo '<a href="eliminar.php?id=' . $row['ID_ESTADISTICA'] . '&tipo=estadisticas">Eliminar</a>';
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
