<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Alimentos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }
        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }
        h1 {
            margin: 0;
            font-size: 2em;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #444;
            color: #fff;
        }
        button {
            background-color: #1a8cff;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #resultados {
            margin-top: 20px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Calculadora de Alimentos</h1>
    </header>

    <form id="formulario">
        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso" required>

        <label for="altura">Altura (cm):</label>
        <input type="number" id="altura" name="altura" required>

        <label for="actividad">Nivel de actividad física:</label>
        <select id="actividad" name="actividad">
            <option value="sedentario">Sedentario</option>
            <option value="ligero">Ligero</option>
            <option value="moderado">Moderado</option>
            <option value="activo">Activo</option>
            <option value="muy-activo">Muy activo</option>
        </select>

        <label for="sexo">Sexo:</label>
        <label><input type="radio" name="sexo" value="masculino" required>Masculino</label>
        <label><input type="radio" name="sexo" value="femenino" required>Femenino</label>

        <button type="button" onclick="calcular()">Calcular</button>
    </form>

    <div id="resultados"></div>

    <script>
    function calcular() {
        var peso = parseFloat(document.getElementById('peso').value);
        var altura = parseFloat(document.getElementById('altura').value);
        var actividad = document.getElementById('actividad').value;
        var sexo = document.querySelector('input[name="sexo"]:checked').value;

        // Fórmula de Harris-Benedict
        var factorActividad = 1.2; // Por defecto, para actividad sedentaria
        switch (actividad) {
            case 'ligero':
                factorActividad = 1.375;
                break;
            case 'moderado':
                factorActividad = 1.55;
                break;
            case 'activo':
                factorActividad = 1.725;
                break;
            case 'muy-activo':
                factorActividad = 1.9;
                break;
        }

        var calorias;
        if (sexo === 'masculino') {
            calorias = 88.362 + (13.397 * peso) + (4.799 * altura) - (5.677 * 25); // 25 es un valor de edad de ejemplo
        } else {
            calorias = 447.593 + (9.247 * peso) + (3.098 * altura) - (4.330 * 25);
        }

        calorias *= factorActividad;

        var resultadosDiv = document.getElementById('resultados');
        resultadosDiv.innerHTML = '<h2>Resultados:</h2>' +
            '<p>Calorías diarias recomendadas: ' + Math.round(calorias) + ' kcal.</p>';
    }
</script>


</body>
</html>
