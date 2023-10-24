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
    <h1>Listado de TARJETAS</h1>
    <table class="table table-stripped table-bordered">
        <tr>
            <th>ID_TARJETAS_JUG</th>
            <th>ID_PARTIDO</th>
            <th>ID_JUGADOR</th>
            <th>TARJ_AMARILLAS</th>
            <th>TARJ_ROJAS</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Establece la conexión a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            $query = "SELECT * FROM TARJETAS_JUGADORES";
            $stid = oci_parse($conn, $query);

            if (oci_execute($stid)) {
                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID_TARJETAS_JUG'] . "</td>";
                    echo "<td>" . $row['ID_PARTIDO'] . "</td>";
                    echo "<td>" . $row['ID_JUGADOR'] . "</td>";
                    echo "<td>" . $row['TARJ_AMARILLAS'] . "</td>";
                    echo "<td>" . $row['TARJ_ROJAS'] . "</td>";
                    echo '<td>';
                    echo '<a href="modificar_tar.php?id=' . $row['ID_TARJETAS_JUG'] . '">Modificar</a>';
                    echo ' | ';
                    echo '<a href="eliminar.php?id=' . $row['ID_TARJETAS_JUG'] . '&tipo=tarjetas">Eliminar</a>';
                    echo '</td>';
                    echo "</tr>";
                }
            } elseif(isset($_POST["tarjeta_form"])) {
                // Este bloque se ejecuta si se envió el formulario de tarjetas de jugadores
                $idTarjetaJugador = $_POST["ID_TARJETAS_JUG"];
                $idPartido = $_POST["ID_PARTIDO"];
                $idJugador = $_POST["ID_JUGADOR"];
                $tarjetasAmarillas = $_POST["TARJ_AMARILLAS"];
                $tarjetasRojas = $_POST["TARJ_ROJAS"];
            
                // Conectar a la base de datos
                $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");
            
                if (!$conn) {
                    echo "No se pudo conectar a la base de datos: " . oci_error();
                } else {
                    // Realiza una consulta SQL UPDATE para modificar las tarjetas de jugadores
                    $query = "UPDATE TARJETAS_JUGADORES 
                              SET ID_PARTIDO = :partido, ID_JUGADOR = :jugador, TARJ_AMARILLAS = :amarillas
                              WHERE ID_TARJETAS_JUG = :id";
            
                    $stid = oci_parse($conn, $query);
            
                    oci_bind_by_name($stid, ":partido", $idPartido);
                    oci_bind_by_name($stid, ":jugador", $idJugador);
                    oci_bind_by_name($stid, ":amarillas", $tarjetasAmarillas);
                    oci_bind_by_name($stid, ":id", $idTarjetaJugador);
            
                    $res = oci_execute($stid);
            
                    if ($res) {
                        echo "Datos de tarjetas de jugadores actualizados correctamente.";
                    } else {
                        echo "Error al actualizar los datos de tarjetas de jugadores: " . oci_error($conn);
                    }
            
                    oci_close($conn);
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
