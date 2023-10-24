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
    <h1>Listado de PARTIDOS</h1>
    <table class="table table-stripped table-bordered">
        <tr>
            <th>ID_PARTIDO</th>
            <th>PART_JORNADA</th>
            <th>PART_EQUIPO_LOCAL</th>
            <th>PART_EQUIPO_VISITANTE</th>
            <th>PART_FECHA_PARTIDO</th>
            <th>ID_ARBITRO</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Establece la conexión a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            $query = "SELECT * FROM PARTIDOS";
            $stid = oci_parse($conn, $query);

            if (oci_execute($stid)) {
                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID_PARTIDO'] . "</td>";
                    echo "<td>" . $row['PART_JORNADA'] . "</td>";
                    echo "<td>" . $row['PART_EQUIPO_LOCAL'] . "</td>";
                    echo "<td>" . $row['PART_EQUIPO_VISITANTE'] . "</td>";
                    echo "<td>" . $row['PART_FECHA_PARTIDO'] . "</td>";
                    echo "<td>" . $row['ID_ARBITRO'] . "</td>";
                    echo '<td>';
                    echo '<a href="modificar_par.php?id=' . $row['ID_PARTIDO'] . '">Modificar</a>';
                    echo ' | ';
                    echo '<a href="eliminar.php?id=' . $row['ID_PARTIDO'] . '&tipo=partido">Eliminar</a>';
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
