<?php
$dia = $_POST['dia'] ?? '';              // Recibe el día del formulario; vacío si no se envió
$mes = $_POST['mes'] ?? '';              // Recibe el mes del formulario; vacío si no se envió
$estacion = '';                          // Variable para el resultado de la estación, vacía al inicio

if ($dia !== '' && $mes !== '') {        // Solo calcula si el usuario escribió día y mes
    $md = (int)$mes * 100 + (int)$dia;   // Junta mes y día en un solo número (15 de octubre = 1015) para comparar fácil

    if ($md >= 1221 || $md <= 320) {     // Del 21 de diciembre (1221) al 20 de marzo (320)
        $estacion = 'VERANO';            // Es verano
    } elseif ($md <= 621) {              // Hasta el 21 de junio (621), o sea del 21 de marzo al 21 de junio
        $estacion = 'OTONO';             // Es otoño
    } elseif ($md <= 922) {              // Hasta el 22 de septiembre (922), o sea del 22 de junio al 22 de septiembre
        $estacion = 'INVIERNO';          // Es invierno
    } else {                             // El resto: del 23 de septiembre al 20 de diciembre
        $estacion = 'PRIMAVERA';         // Es primavera
    }                                    // Fin de los if
}                                        // Fin del if principal
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
    <h3>Ejercicio 3</h3>
    <form method="post">
        Dia: <input type="number" min="1" max="31" name="dia" value="<?= $dia ?>"><br><br>
        Mes: <input type="number" min="1" max="12" name="mes" value="<?= $mes ?>"><br><br>
        Estacion: <input type="text" value="<?= $estacion ?>" readonly><br><br>
        <button>Calcular</button>
    </form>
</body>
</html>