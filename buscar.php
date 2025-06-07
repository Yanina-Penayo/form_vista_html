<?php
#no me deja pushear dice que no tengo permisos. esta hecho el commit
$archivo = __DIR__ . '/datos.txt';

if (!file_exists($archivo)) {
    echo "<p class='text-danger'>No se encontró el archivo de datos.</p>";
    exit;
}
$lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (isset($_GET['criterio']) && isset($_GET['termino']) && strlen(trim($_GET['termino'])) >= 3) {
    $criterio = strtolower(trim($_GET['criterio']));
    $termino = strtolower(trim($_GET['termino']));
    $mapa = [
        'titulo' => 2,
        'autor' => 4,
        'editorial' => 7,
        'genero' => 6
    ];

    if (!isset($mapa[$criterio])) {
        echo "<p class='text-danger'>Criterio inválido. Usa: título, autor, editorial o género.</p>";
        exit;
    }
    $indice = $mapa[$criterio];
    $resultados = [];
    foreach ($lineas as $linea) {
        $campos = explode('|', $linea);
        if (isset($campos[$indice]) && stripos($campos[$indice], $termino) !== false) {
            $resultados[] = $campos;
        }
    }
    if (count($resultados) > 0) {
        echo "<div class='container mt-4'>";
        echo "<h3>Resultados encontrados:</h3>";
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Código</th><th>Signatura</th><th>Título</th><th>Autor</th><th>Género</th><th>Editorial</th><th>Año</th></tr></thead><tbody>";

        foreach ($resultados as $campos) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($campos[0] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[1] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[2] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[4] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[6] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[7] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($campos[9] ?? '-') . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo "<p class='text-danger'>No se encontraron resultados para ese criterio.</p>";
    }

} else {
    echo "<p class='text-danger'>Faltan parámetros o el término tiene menos de 3 caracteres.</p>";
}
?>
