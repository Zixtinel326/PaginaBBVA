<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Altas de Árbitro</title>
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
    <form action="altas_arb.php" method="post">
        <label for="ID_ARBITRO">ID_ARBITRO</label>
        <input type="text" name="ID_ARBITRO" id="ID_ARBITRO">

        <label for="ARB_NOMBRE">ARB_NOMBRE</label>
        <input type="text" name="ARB_NOMBRE" id="ARB_NOMBRE">

        <label for="ARB_APELLIDOP">ARB_APELLIDOP</label>
        <input type="text" name="ARB_APELLIDOP" id="ARB_APELLIDOP">

        <label for="ARB_APELLIDOM">ARB_APELLIDOM</label>
        <input type="text" name="ARB_APELLIDOM" id="ARB_APELLIDOM">
        
        <label for="ARB_APODO">ARB_APODO</label>
        <input type="text" name="ARB_APODO" id="ARB_APODO">
        
        <label for="ARB_FECHA_NAC">ARB_FECHA_NAC</label>
        <input type="text" name="ARB_FECHA_NAC" id="ARB_FECHA_NAC">

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
