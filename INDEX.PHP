<?php
// Nombre de usuario y contraseña para la conexión Oracle
$username = "SYSTEM";
$password = "Linevk";
$connection_string = "localhost/xe"; // Por ejemplo, "localhost/XE"

// Intenta conectarte a Oracle
$conn = oci_connect($username, $password, $connection_string);

if (!$conn) {
    // Manejar errores de conexión
    echo "No se pudo conectar a la base de datos: " . oci_error();
} else {
    // La conexión fue exitosa, puedes realizar consultas y otras operaciones aquí
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 18px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid #333;
            border-radius: 5px;
            background-color: #fff;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a la Base BBVA</h1>
        <p>Selecciona una opción:</p>
        <ul>
            <li><a href="MENU_ALTAS.PHP">Altas</a></li>
            <li><a href="MENU_CONSULTAS.PHP">Bajas</a></li>
            <li><a href="MENU_CONSULTAS.PHP">Consultas</a></li>
        </ul>
    </div>
</body>
</html>
