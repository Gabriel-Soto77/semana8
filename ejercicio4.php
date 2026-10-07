<?php
$calidad = $_POST['calidad'] ?? '';      // Recibe la calidad del formulario; vacío si no se envió
$producto = $_POST['producto'] ?? '';    // Recibe el producto del formulario; vacío si no se envió
$precio = '';                            // Variable para el precio, vacía al inicio

$precios = [                             // Tabla de precios guardada en una matriz: $precios[producto][calidad]
    1 => [1 => 5000, 2 => 4500, 3 => 4000],   // Producto 1 con calidades 1, 2 y 3
    2 => [1 => 4500, 2 => 4000, 3 => 3500],   // Producto 2 con calidades 1, 2 y 3
    3 => [1 => 4000, 2 => 3500, 3 => 3000],   // Producto 3 con calidades 1, 2 y 3
];                                       // Fin de la matriz

if ($calidad !== '' && $producto !== '') {                    // Solo calcula si escribió calidad y producto
    if (isset($precios[(int)$producto][(int)$calidad])) {     // Verifica que esa combinación exista en la tabla
        $precio = $precios[(int)$producto][(int)$calidad];    // Busca y guarda el precio de esa combinación
    } else {                                                  // Si la combinación no existe
        $precio = 'Use valores del 1 al 3';                   // Muestra un mensaje de aviso
    }                                                         // Fin del if interno
}                                                             // Fin del if principal
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
</head>
<body>
    <h3>Ejercicio 4</h3>
    <form method="post">
        Calidad: <input type="number" min="1" max="3" name="calidad" value="<?= $calidad ?>"><br><br>
        Producto: <input type="number" min="1" max="3" name="producto" value="<?= $producto ?>"><br><br>
        Precio: <input type="text" value="<?= $precio ?>" readonly><br><br>
        <button>Calcular</button>
    </form>
</body>
</html>