<?php
$consumo = $_POST['consumo'] ?? '';      // Recibe el consumo enviado por el formulario; si no hay nada, queda vacío
$md = '';                                // Variable para el monto del descuento, vacía al inicio
$igv = '';                               // Variable para el impuesto, vacía al inicio
$pagar = '';                             // Variable para el importe a pagar, vacía al inicio

if ($consumo !== '') {                   // Solo calcula si el usuario escribió un consumo
    $c = (float)$consumo;                // Convierte el texto en número decimal
    if ($c <= 100) {                     // Si el consumo es hasta S/.100
        $md = $c * 0.10;                 // El descuento es el 10% del consumo
    } else {                             // Si el consumo es mayor a S/.100
        $md = $c * 0.20;                 // El descuento es el 20% del consumo
    }                                    // Fin del if del descuento
    $igv = ($c - $md) * 0.19;            // Impuesto del 19% sobre el monto ya descontado
    $pagar = ($c - $md) + $igv;          // Importe a pagar = consumo - descuento + impuesto
}                                        // Fin del if principal
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <h3>Ejercicio 1</h3>
    <form method="post"> <!-- method post: envía los datos a este mismo archivo -->
        Consumo: <input type="number" step="0.01" name="consumo" value="<?= $consumo ?>"><br><br>
        Monto descuento: <input type="text" value="<?= $md ?>" readonly><br><br> <!-- readonly: solo muestra el resultado -->
        Impuesto IGV: <input type="text" value="<?= $igv ?>" readonly><br><br>
        Importe a pagar: <input type="text" value="<?= $pagar ?>" readonly><br><br>
        <button>Calcular</button>
    </form>
</body>
</html>