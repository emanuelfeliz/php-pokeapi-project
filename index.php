<?php
// Consumir la API para obtener los primeros 150 Pokémon
$apiUrl = 'https://pokeapi.co/api/v2/pokemon?limit=150';
$response = file_get_contents($apiUrl);
$pokemonData = json_decode($response, true);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pokemones</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Lista de Pokemones</h1>
    <div class="pokemon-list">
        <?php foreach ($pokemonData['results'] as $pokemon): ?>
            <div class="pokemon-card">
                <h2><?php echo ucfirst($pokemon['name']); ?></h2>
                <a href="pokemon-details.php?url=<?php echo $pokemon['url']; ?>" class="details-button">Ver detalles</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

