<?php


if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    // Conectar a la base de datos
    $conn = oci_connect("SYSTEM", "Linevk", "localhost/xe");

    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Eliminación de Registro</title>';
    echo '<style>';
    echo 'body {';
    echo '    font-family: Arial, sans-serif;';
    echo '    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);';
    echo '    margin: 0;';
    echo '    padding: 0;';
    echo '    display: flex;';
    echo '    flex-direction: column;';
    echo '    align-items: center;';
    echo '    justify-content: center;';
    echo '    height: 100vh;';
    echo '}';
    echo 'h1 {';
    echo '    background-color: #333;';
    echo '    color: #fff;';
    echo '    padding: 10px 20px;';
    echo '    border-radius: 5px;';
    echo '    text-align: center;';
    echo '}';
    echo '</style>';
    echo '</head>';
    echo '<body>';

    if (!$conn) {
        echo '<h1>No se pudo conectar a la base de datos: ' . oci_error() . '</h1>';
    } else {
        if ($tipo === 'equipos') {
            // Consulta SQL para eliminar un equipo
            $query = "DELETE FROM EQUIPOS WHERE ID_EQUIPO = :id";
        } elseif ($tipo === 'jugadores') {
            // Consulta SQL para eliminar un jugador
            $query = "DELETE FROM JUGADOR WHERE ID_JUGADOR = :id";
        } elseif ($tipo === 'dt') {
            // Consulta SQL para eliminar un DT
            $query = "DELETE FROM DT WHERE ID_DT = :id";
        } elseif ($tipo === 'auxiliar') {
            // Consulta SQL para eliminar un auxiliar técnico
            $query = "DELETE FROM AUXILIAR_TECNICO WHERE ID_AUX = :id";
        } elseif ($tipo === 'estadios') {
            // Consulta SQL para eliminar un estadio
            $query = "DELETE FROM ESTADIOS WHERE ID_ESTADIO = :id";
        } elseif ($tipo === 'partido') {
            // Consulta SQL para eliminar un partido
            $query = "DELETE FROM PARTIDOS WHERE ID_TARJETAS_JUG = :id";
        } elseif ($tipo === 'tarjetas') {
            // Consulta SQL para eliminar una tarjeta
            $query = "DELETE FROM TARJETAS_JUGADORES WHERE ID_DT = :id";
        } elseif ($tipo === 'estadisticas') {
            // Consulta SQL para eliminar estadísticas
            $query = "DELETE FROM ESTADISTICAS WHERE ID_ESTADISTICA = :id";
        } elseif ($tipo === 'goles') {
            // Consulta SQL para eliminar un gol
            $query = "DELETE FROM GOLES WHERE ID_GOL = :id";
        } elseif ($tipo === 'aux') {
            // Consulta SQL para eliminar un árbitro
            $query = "DELETE FROM ARBITROS WHERE ID_ARBITRO = :id";
        } else {
            echo '<h1>Tipo de registro no válido.</h1>';
            oci_close($conn);
            echo '</body>';
            echo '</html>';
            exit;
        }

        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ":id", $id);
        $res = oci_execute($stid);

        if ($res) {
            echo '<h1>Registro eliminado correctamente</h1>';
        } else {
            echo '<h1>Error al eliminar el registro: ' . oci_error($conn) . '</h1>';
        }

        oci_close($conn);
    }

    echo '</body>';
    echo '</html>';
} else {
    echo '<h1>ID o tipo de registro no especificado.</h1>';
}
?>
