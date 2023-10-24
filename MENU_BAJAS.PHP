<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
        <h1>Bajas</h1>
        <p>Selecciona una opción:</p>
        <ul>
            <li><a href="ELIMINAR_EQUIPO.PHP">EQUIPOS</a></li>
            <li><a href="ELIMINAR_JUGADORES.PHP">JUGADORES</a></li>
            <li><a href="ELIMINAR_DT.PHP">DT</a></li>
            <li><a href="ELIMINAR_AUXILIAR.PHP">AUXILIAR TÉCNICO</a></li>
            <li><a href="ELIMINAR_ESTADIO.PHP">ESTADIOS</a></li>
            <li><a href="ELIMINAR_PARTIDO.PHP">PARTIDOS</a></li>
            <li><a href="ELIMINAR_TARJETA.PHP">TARJETAS JUGADORES</a></li>
            <li><a href="ELIMINAR_ESTADISTICAS.PHP">ESTADÍSTICAS</a></li>
            <li><a href="ELIMINAR_GOL.PHP">GOLES</a></li>
            <li><a href="ELIMINAR_ARBITRO.PHP">ARBITROS</a></li>
        </ul>
    </div>
</body>
</html>
