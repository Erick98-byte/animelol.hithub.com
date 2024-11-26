<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <!-- Encabezado, puede copiar el mismo encabezado que en su archivo HTML principal -->
    </header>

    <main>
        <section class="anime-list">
            <?php
            if (isset($_GET['q'])) {
                $search_query = $_GET['q']; // Obtenemos la consulta de búsqueda
                $results = performSearch($search_query); // Llamamos a una función para realizar la búsqueda

                if (count($results) > 0) {
                    foreach ($results as $result) {
                        // Mostrar resultados aquí, puedes usar un bucle para mostrar los resultados
                        echo '<article class="anime-item">';
                        echo '<a href="' . $result['url'] . '">';
                        echo '<img src="' . $result['image'] . '" width="100%" alt="' . $result['name'] . '">';
                        echo '</a>';
                        echo '<h2>' . $result['name'] . '</h2>';
                        echo '</article>';
                    }
                } else {
                    echo '<p>No se encontraron resultados para la búsqueda.</p>';
                }
            } else {
                echo '<p>Ingresa una consulta de búsqueda.</p>';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>Derechos de autor © 2023 Mi Sitio de Anime</p>
    </footer>
</body>
</html>

<?php
// Función de ejemplo para realizar la búsqueda
function performSearch($query) {
    // Este es un ejemplo muy simplificado, deberás reemplazarlo con tu propia lógica de búsqueda
    $animeData = [
        // Aquí deberías tener un arreglo o datos de tus animes
        // Por ejemplo:
        ['name' => 'Bleach', 'url' => 'anime1.html', 'image' => 'bleach/anime1.jpg'],
        ['name' => 'Evangelion', 'url' => 'evangelion.html', 'image' => 'evangelion/evangelion.jpg'],
        // Otros animes...
    ];

    $results = [];
    foreach ($animeData as $anime) {
        if (stripos($anime['name'], $query) !== false) {
            $results[] = $anime;
        }
    }

    return $results;
}
?>
