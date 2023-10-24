<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
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
        <h1>Consultas</h1>
        <p>Selecciona una opción:</p>
        <ul>
            <li><a href="CONSULTA_EQ.PHP">EQUIPOS</a></li>
            <li><a href="CONSULTA_JU.PHP">JUGADORES</a></li>
            <li><a href="CONSULTA_DT.PHP">DT</a></li>
            <li><a href="CONSULTA_AUXILIAR.PHP">AUXILIAR TÉCNICO</a></li>
            <li><a href="CONSULTA_ESTADIOS.PHP">ESTADIOS</a></li>
            <li><a href="CONSULTA_PARTIDOS.PHP">PARTIDOS</a></li>
            <li><a href="CONSULTA_TARJETAS.PHP">TARJETAS JUGADORES</a></li>
            <li><a href="CONSULTA_ESTADISTICAS.PHP">ESTADÍSTICAS</a></li>
            <li><a href="CONSULTA_GOLES.PHP">GOLES</a></li>
            <li><a href="CONSULTA_ARBITRO.PHP">ARBITROS</a></li>
        </ul>
    </div>
</body>
</html>
