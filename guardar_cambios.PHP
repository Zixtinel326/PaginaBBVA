<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Registro</title>
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
        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["equipo_form"])) {
        // Este bloque se ejecuta si se envió el formulario de equipos
        $idEquipo = $_POST["ID_EQUIPO"];
        $nombreEquipo = $_POST["EQ_NOMBRE"];
        $apodoEquipo = $_POST["EQ_APODO"];
        $direccionEquipo = $_POST["EQ_DIRECCION"];
        $fechaFundacion = $_POST["EQ_FECHA_FUNDACION"];
        $idEstadio = $_POST["ID_ESTADIO"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el equipo
            $query = "UPDATE EQUIPOS 
                      SET EQ_NOMBRE = :nombre, EQ_APODO = :apodo, EQ_DIRECCION = :direccion, 
                          EQ_FECHA_FUNDACION = TO_DATE(:fechaFundacion, 'YYYY-MM-DD'), ID_ESTADIO = :idEstadio
                      WHERE ID_EQUIPO = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":nombre", $nombreEquipo);
            oci_bind_by_name($stid, ":apodo", $apodoEquipo);
            oci_bind_by_name($stid, ":direccion", $direccionEquipo);
            oci_bind_by_name($stid, ":fechaFundacion", $fechaFundacion);
            oci_bind_by_name($stid, ":idEstadio", $idEstadio);
            oci_bind_by_name($stid, ":id", $idEquipo);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del equipo actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del equipo: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["jugador_form"])) {
        // Este bloque se ejecuta si se envió el formulario de jugadores
        $idJugador = $_POST["ID_JUGADOR"];
        $nombreJugador = $_POST["JUG_NOMBRE"];
        $apellidoPaterno = $_POST["JUG_APELLIDOP"];
        $apellidoMaterno = $_POST["JUG_APELLIDOM"];
        $apodoJugador = $_POST["JUG_APODO"];
        $nacionalidadJugador = $_POST["JUG_NACIONALIDAD"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el jugador
            $query = "UPDATE JUGADOR 
                      SET JUG_NOMBRE = :nombre, JUG_APELLIDOP = :apaterno, JUG_APELLIDOM = :amaterno, 
                          JUG_APODO = :apodo, JUG_NACIONALIDAD = :nacionalidad
                      WHERE ID_JUGADOR = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":nombre", $nombreJugador);
            oci_bind_by_name($stid, ":apaterno", $apellidoPaterno);
            oci_bind_by_name($stid, ":amaterno", $apellidoMaterno);
            oci_bind_by_name($stid, ":apodo", $apodoJugador);
            oci_bind_by_name($stid, ":nacionalidad", $nacionalidadJugador);
            oci_bind_by_name($stid, ":id", $idJugador);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del jugador actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del jugador: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["dt_form"])) {
        // Este bloque se ejecuta si se envió el formulario de directores técnicos (DT)
        $idDT = $_POST["ID_DT"];
        $nombreDT = $_POST["DT_NOMBRE"];
        $apellidoPaternoDT = $_POST["DT_APELLIDOP"];
        $apellidoMaternoDT = $_POST["DT_APELLIDOM"];
        $apodoDT = $_POST["DT_APODO"];
        $fechaNacimientoDT = $_POST["DT_FECHA_NAC"];
        $nacionalidadDT = $_POST["DT_NACIONALIDAD"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el director técnico (DT)
            $query = "UPDATE DT 
                      SET DT_NOMBRE = :nombre, DT_APELLIDOP = :apaterno, DT_APELLIDOM = :amaterno, 
                          DT_APODO = :apodo, DT_FECHA_NAC = TO_DATE(:fechaNacimiento, 'YYYY-MM-DD'),
                          DT_NACIONALIDAD = :nacionalidad
                      WHERE ID_DT = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":nombre", $nombreDT);
            oci_bind_by_name($stid, ":apaterno", $apellidoPaternoDT);
            oci_bind_by_name($stid, ":amaterno", $apellidoMaternoDT);
            oci_bind_by_name($stid, ":apodo", $apodoDT);
            oci_bind_by_name($stid, ":fechaNacimiento", $fechaNacimientoDT);
            oci_bind_by_name($stid, ":nacionalidad", $nacionalidadDT);
            oci_bind_by_name($stid, ":id", $idDT);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del director técnico (DT) actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del director técnico (DT): " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["auxiliar_tecnico_form"])) {
        // Este bloque se ejecuta si se envió el formulario de auxiliares técnicos
        $idAuxiliar = $_POST["ID_AUX"];
        $nombreAuxiliar = $_POST["AUX_NOMBRE"];
        $apellidoPaternoAuxiliar = $_POST["AUX_APELLIDOP"];
        $apellidoMaternoAuxiliar = $_POST["AUX_APELLIDOM"];
        $idDT = $_POST["ID_DT"]; // ID del director técnico al que está asociado

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el auxiliar técnico
            $query = "UPDATE AUXILIAR_TECNICO 
                      SET AUX_NOMBRE = :nombre, AUX_APELLIDOP = :apaterno, AUX_APELLIDOM = :amaterno, 
                          ID_DT = :idDT
                      WHERE ID_AUX = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":nombre", $nombreAuxiliar);
            oci_bind_by_name($stid, ":apaterno", $apellidoPaternoAuxiliar);
            oci_bind_by_name($stid, ":amaterno", $apellidoMaternoAuxiliar);
            oci_bind_by_name($stid, ":idDT", $idDT);
            oci_bind_by_name($stid, ":id", $idAuxiliar);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del auxiliar técnico actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del auxiliar técnico: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["estadio_form"])) {
        // Este bloque se ejecuta si se envió el formulario de estadios
        $idEstadio = $_POST["ID_ESTADIO"];
        $nombreEstadio = $_POST["EST_NOMBRE"];
        $apodoEstadio = $_POST["EST_APODO"];
        $capacidadEstadio = $_POST["EST_CAPACIDAD"];
        $precioPromedioLugares = $_POST["EST_PRECIOPROMEDIO_LUGARES"];
        $direccionEstadio = $_POST["EST_DIRECCION"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el estadio
            $query = "UPDATE ESTADIOS 
                      SET EST_NOMBRE = :nombre, EST_APODO = :apodo, 
                          EST_CAPACIDAD = :capacidad, EST_PRECIOPROMEDIO_LUGARES = :precioLugares,
                          EST_DIRECCION = :direccion
                      WHERE ID_ESTADIO = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":nombre", $nombreEstadio);
            oci_bind_by_name($stid, ":apodo", $apodoEstadio);
            oci_bind_by_name($stid, ":capacidad", $capacidadEstadio);
            oci_bind_by_name($stid, ":precioLugares", $precioPromedioLugares);
            oci_bind_by_name($stid, ":direccion", $direccionEstadio);
            oci_bind_by_name($stid, ":id", $idEstadio);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del estadio actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del estadio: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["partido_form"])) {
        // Este bloque se ejecuta si se envió el formulario de partidos
        $idPartido = $_POST["ID_PARTIDO"];
        $jornadaPartido = $_POST["PART_JORNADA"];
        $equipoLocal = $_POST["PART_EQUIPO_LOCAL"];
        $equipoVisitante = $_POST["PART_EQUIPO_VISITANTE"];
        $fechaPartido = $_POST["PART_FECHA_PARTIDO"];
        $idArbitro = $_POST["ID_ARBITRO"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el partido
            $query = "UPDATE PARTIDOS 
                      SET PART_JORNADA = :jornada, PART_EQUIPO_LOCAL = :local, PART_EQUIPO_VISITANTE = :visitante,
                          PART_FECHA_PARTIDO = TO_DATE(:fecha, 'YYYY-MM-DD'), ID_ARBITRO = :arbitro
                      WHERE ID_PARTIDO = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":jornada", $jornadaPartido);
            oci_bind_by_name($stid, ":local", $equipoLocal);
            oci_bind_by_name($stid, ":visitante", $equipoVisitante);
            oci_bind_by_name($stid, ":fecha", $fechaPartido);
            oci_bind_by_name($stid, ":arbitro", $idArbitro);
            oci_bind_by_name($stid, ":id", $idPartido);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del partido actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del partido: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["estadistica_form"])) {
        // Este bloque se ejecuta si se envió el formulario de estadísticas
        $idEstadistica = $_POST["ID_ESTADISTICA"];
        $golesLocal = $_POST["ETD_GOLES_L"];
        $golesVisitante = $_POST["ETD_GOLES_V"];
        $tirosArcoLocal = $_POST["ETD_TIROS_ARCO_L"];
        $tirosArcoVisitante = $_POST["ETD_TIROS_ARCO_V"];
        $posesionLocal = $_POST["ETD_POSESION_L"];
        $posesionVisitante = $_POST["ETD_POSESION_V"];
        $idPartido = $_POST["ID_PARTIDO"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar las estadísticas
            $query = "UPDATE ESTADISTICAS 
                      SET ETD_GOLES_L = :golesLocal, ETD_GOLES_V = :golesVisitante,
                          ETD_TIROS_ARCO_L = :tirosArcoLocal, ETD_TIROS_ARCO_V = :tirosArcoVisitante,
                          ETD_POSESION_L = :posesionLocal, ETD_POSESION_V = :posesionVisitante
                      WHERE ID_ESTADISTICA = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":golesLocal", $golesLocal);
            oci_bind_by_name($stid, ":golesVisitante", $golesVisitante);
            oci_bind_by_name($stid, ":tirosArcoLocal", $tirosArcoLocal);
            oci_bind_by_name($stid, ":tirosArcoVisitante", $tirosArcoVisitante);
            oci_bind_by_name($stid, ":posesionLocal", $posesionLocal);
            oci_bind_by_name($stid, ":posesionVisitante", $posesionVisitante);
            oci_bind_by_name($stid, ":id", $idEstadistica);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos de estadísticas actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos de estadísticas: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    } elseif (isset($_POST["gol_form"])) {
        // Este bloque se ejecuta si se envió el formulario de goles
        $idGol = $_POST["ID_GOL"];
        $idEstadistica = $_POST["ID_ESTADISTICA"];
        $equipoAnotador = $_POST["EQUIPO_ANOTADOR"];
        $jugadorAnotador = $_POST["JUGADOR_ANOTADOR"];
        $minutoGol = $_POST["MINUTO_ANOTACION"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el gol
            $query = "UPDATE GOLES 
                      SET ID_ESTADISTICA = :idEstadistica, EQUIPO_ANOTADOR = :equipoAnotador,
                          JUGADOR_ANOTADOR = :jugadorAnotador, MINUTO_ANOTACION = :minutoGol
                      WHERE ID_GOL = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":idEstadistica", $idEstadistica);
            oci_bind_by_name($stid, ":equipoAnotador", $equipoAnotador);
            oci_bind_by_name($stid, ":jugadorAnotador", $jugadorAnotador);
            oci_bind_by_name($stid, ":minutoGol", $minutoGol);
            oci_bind_by_name($stid, ":id", $idGol);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del gol actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del gol: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    }elseif (isset($_POST["gol_form"])) {
        // Este bloque se ejecuta si se envió el formulario de goles
        $idGol = $_POST["ID_GOL"];
        $idEstadistica = $_POST["ID_ESTADISTICA"];
        $equipoAnotador = $_POST["EQUIPO_ANOTADOR"];
        $jugadorAnotador = $_POST["JUGADOR_ANOTADOR"];
        $minutoGol = $_POST["MINUTO_ANOTACION"];

        // Conectar a la base de datos
        $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

        echo '<h1>';
        if (!$conn) {
            echo "No se pudo conectar a la base de datos: " . oci_error();
        } else {
            // Realiza una consulta SQL UPDATE para modificar el gol
            $query = "UPDATE GOLES 
                      SET ID_ESTADISTICA = :idEstadistica, EQUIPO_ANOTADOR = :equipoAnotador,
                          JUGADOR_ANOTADOR = :jugadorAnotador, MINUTO_ANOTACION = :minutoGol
                      WHERE ID_GOL = :id";

            $stid = oci_parse($conn, $query);

            oci_bind_by_name($stid, ":idEstadistica", $idEstadistica);
            oci_bind_by_name($stid, ":equipoAnotador", $equipoAnotador);
            oci_bind_by_name($stid, ":jugadorAnotador", $jugadorAnotador);
            oci_bind_by_name($stid, ":minutoGol", $minutoGol);
            oci_bind_by_name($stid, ":id", $idGol);

            $res = oci_execute($stid);

            if ($res) {
                echo "Datos del gol actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos del gol: " . oci_error($conn);
            }

            oci_close($conn);
        }
        echo '</h1>';
    }
}
?>
</body>
</html>
