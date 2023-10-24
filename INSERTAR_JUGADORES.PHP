<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Altas de JUGADORES</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form class="" action= "altas_ju.php" method="post">

        <label for="">ID_JUGADOR</label>
        <input type="text" name="ID_JUGADOR"values="">

        <label for="">JUG_NOMBRE</label>
        <input type="text" name="JUG_NOMBRE"values="">

        <label for="">JUG_APELLIDOP</label>
        <input type="text" name="JUG_APELLIDOP"values="">

        <label for="">JUG_APELLIDOM</label>
        <input type="text" name="JUG_APELLIDOM"values="">

        <label for="">JUG_APODO</label>
        <input type="text" name="JUG_APODO"values="">

        <label for="">JUG_NACIONALIDAD</label>
        <input type="text" name="JUG_NACIONALIDAD"values="">

        <label for="">JUG_DORSAL</label>
        <input type="text" name="JUG_DORSAL"values="">

        <label for="">JUG_POSICION</label>
        <input type="text" name="JUG_POSICION"values="">

        <label for="">JUG_PRECIO_MERCADO</label>
        <input type="text" name="JUG_PRECIO_MERCADO"values="">

        <label for="">ID_EQUIPO</label>
        <input type="text" name="ID_EQUIPO"values="">

        <label for="">ID_DT</label>
        <input type="text" name="ID_DT"values="">

        <label for="">JUG_FECHA_NACIMIENTO</label>
        <input type="text" name="JUG_FECHA_NACIMIENTO"values="">

        <input type="submit" name=""values="Guardar">

</form>
    </body>
</html>