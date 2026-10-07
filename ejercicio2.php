<?php
$temp = $_POST['temp'] ?? '';            // Recibe la temperatura del formulario; vacío si no se envió
$clima = '';                             // Variable para el resultado del clima, vacía al inicio

if ($temp !== '') {                      // Solo calcula si el usuario escribió una temperatura
    $t = (float)$temp;                   // Convierte el texto en número decimal
    if ($t < 10) {                       // Si la temperatura es menor a 10
        $clima = 'FRIO';                 // El clima es frío
    } elseif ($t <= 20) {                // Si no, y es menor o igual a 20 (o sea entre 10 y 20)
        $clima = 'NUBLADO';              // El clima es nublado
    } elseif ($t <= 30) {                // Si no, y es menor o igual a 30 (o sea entre 21 y 30)
        $clima = 'CALOR';                // El clima es calor
    } else {                             // Si no cumple nada de lo anterior (mayor a 30)
        $clima = 'TROPICAL';             // El clima es tropical
    }                                    // Fin de los if
}                                        // Fin del if principal
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>
    <h3>Ejercicio 2</h3>
    <form method="post">
        Temperatura: <input type="number" step="any" name="temp" value="<?= $temp ?>"><br><br>
        Clima: <input type="text" value="<?= $clima ?>" readonly><br><br>
        <button>Calcular</button>
    </form>
</body>
</html>