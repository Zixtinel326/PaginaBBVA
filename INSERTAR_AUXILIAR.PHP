<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Altas de Auxiliar</title>
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
    <form action="altas_aux.php" method="post">
        <label for="ID_AUX">ID_AUX</label>
        <input type="text" name="ID_AUX" id="ID_AUX">

        <label for="AUX_NOMBRE">AUX_NOMBRE</label>
        <input type="text" name="AUX_NOMBRE" id="AUX_NOMBRE">

        <label for="AUX_APELLIDOP">AUX_APELLIDOP</label>
        <input type="text" name="AUX_APELLIDOP" id="AUX_APELLIDOP">

        <label for="AUX_APELLIDOM">AUX_APELLIDOM</label>
        <input type="text" name="AUX_APELLIDOM" id="AUX_APELLIDOM">

        <label for="ID_DT">ID_DT</label>
        <input type="text" name="ID_DT" id="ID_DT">

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
