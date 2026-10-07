<?php
$ni = $_POST['ni'] ?? '';                // Recibe el número inicial; vacío si no se envió
$nf = $_POST['nf'] ?? '';                // Recibe el número final; vacío si no se envió
$cp = '';                                // Cantidad de positivos, vacía al inicio
$cn = '';                                // Cantidad de negativos, vacía al inicio

if ($ni !== '' && $nf !== '') {          // Solo calcula si el usuario escribió ambos números
    $cp = 0;                             // Inicia el contador de positivos en 0
    $cn = 0;                             // Inicia el contador de negativos en 0
    $i = (int)$ni;                       // Empieza a recorrer desde el número inicial
    while ($i <= (int)$nf) {             // WHILE: repite mientras $i no pase del número final (evalúa ANTES de entrar)
        if ($i > 0) {                    // Si el número es mayor a 0
            $cp++;                       // Suma 1 a los positivos
        } elseif ($i < 0) {              // Si el número es menor a 0
            $cn++;                       // Suma 1 a los negativos (el 0 no se cuenta)
        }                                // Fin del if
        $i++;                            // Pasa al siguiente número (si no, el bucle sería infinito)
    }                                    // Fin del while
}                                        // Fin del if principal
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5a</title>
</head>
<body>
    <h3>Ejercicio 5a - While</h3>
    <form method="post">
        Num. Inicial: <input type="number" name="ni" value="<?= $ni ?>"><br><br>
        Num. Final: <input type="number" name="nf" value="<?= $nf ?>"><br><br>
        Cant. Positivos: <input type="text" value="<?= $cp ?>" readonly><br><br>
        Cant. Negativos: <input type="text" value="<?= $cn ?>" readonly><br><br>
        <button>Calcular</button>
    </form>
</body>
</html>