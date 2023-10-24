<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de JUGADOR</title>
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

        .table-container {
            width: 80%;
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%; /* Utiliza el 100% del ancho del contenedor */
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
    <h1>Listado de JUGADOR</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>ID_JUGADOR</th>
                <th>JUG_NOMBRE</th>
                <th>JUG_APELLIDOP</th>
                <th>JUG_APELLIDOM</th>
                <th>JUG_APODO</th>
                <th>JUG_NACIONALIDAD</th>
                <th>JUG_DORSAL</th>
                <th>JUG_POSICION</th>
                <th>JUG_PRECIO_MERCADO</th>
                <th>ID_EQUIPO</th>
                <th>ID_DT</th>
                <th>JUG_FECHA_NACIMIENTO</th>
                <th>Acciones</th>
            </tr>

            <?php
            // Establece la conexión a la base de datos
            $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

            if (!$conn) {
                echo "No se pudo conectar a la base de datos: " . oci_error();
            } else {
                $query = "SELECT * FROM JUGADOR";
                $stid = oci_parse($conn, $query);

                if (oci_execute($stid)) {
                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_JUGADOR'] . "</td>";
                        echo "<td>" . $row['JUG_NOMBRE'] . "</td>";
                        echo "<td>" . $row['JUG_APELLIDOP'] . "</td>";
                        echo "<td>" . $row['JUG_APELLIDOM'] . "</td>";
                        echo "<td>" . $row['JUG_APODO'] . "</td>";
                        echo "<td>" . $row['JUG_NACIONALIDAD'] . "</td>";
                        echo "<td>" . $row['JUG_DORSAL'] . "</td>";
                        echo "<td>" . $row['JUG_POSICION'] . "</td>";
                        echo "<td>" . $row['JUG_PRECIO_MERCADO'] . "</td>";
                        echo "<td>" . $row['ID_EQUIPO'] . "</td>";
                        echo "<td>" . $row['ID_DT'] . "</td>";
                        echo "<td>" . $row['JUG_FECHA_NACIMIENTO'] . "</td>";
                        echo '<td class="actions">';
                        echo '<a href="modificar_ju.php?id=' . $row['ID_JUGADOR'] . '">Modificar</a>';
                        echo ' | ';
                        echo '<a href="eliminar.php?id=' . $row['ID_JUGADOR'] . '&tipo=jugadores">Eliminar</a>';
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
    </div>
</body>
</html>
