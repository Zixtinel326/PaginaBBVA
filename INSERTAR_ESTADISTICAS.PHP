<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Altas de ESTADISTICAS</title>
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
    <form class="" action= "altas_estadisticas.php" method="post">

        <label for="">ID_ESTADISTICA</label>
        <input type="text" name="ID_ESTADISTICA"values="">

        <label for="">ETD_GOLES_L</label>
        <input type="text" name="ETD_GOLES_L"values="">

        <label for="">ETD_GOLES_V</label>
        <input type="text" name="ETD_GOLES_V"values="">

        <label for="">ETD_TIROS_ARCO_L</label>
        <input type="text" name="ETD_TIROS_ARCO_L"values="">
        
        <label for="">"ETD_TIROS_ARCO_V", </label>
        <input type="text" name="ETD_TIROS_ARCO_V"values="">
         
        <label for="">"ETD_POSESION_L", </label>
        <input type="text" name="ETD_POSESION_L"values="">
        
        <label for="">"ETD_POSESION_V", </label>
        <input type="text" name="ETD_POSESION_V"values="">
        
        <label for="">"ID_PARTIDO", </label>
        <input type="text" name="ID_PARTIDO"values="">

        <input type="submit" name=""values="Guardar">

</form>
    </body>
</html>