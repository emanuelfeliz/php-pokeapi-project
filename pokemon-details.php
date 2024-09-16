<?php
// Obtener la URL del Pokémon desde el parámetro GET
$pokemonUrl = $_GET['url'];
$response = file_get_contents($pokemonUrl);
$pokemonDetails = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Pokemon</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo ucfirst($pokemonDetails['name']); ?></h1>

        <!-- Habilidades -->
        <div class="details-section">
            <h2>Habilidades</h2>
            <ul>
                <?php foreach ($pokemonDetails['abilities'] as $ability): ?>
                    <li><?php echo ucfirst($ability['ability']['name']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

          <!-- Imagen del Pokémon -->
          <div class="pokemon-image" >
            <img src="<?php echo $pokemonDetails['sprites']['front_default']; ?>" alt="<?php echo ucfirst($pokemonDetails['name']); ?>">
        </div>

        <!-- Movimientos -->
        <div class="details-section">
            <h2>Movimientos</h2>
            <ul>
                <?php foreach ($pokemonDetails['moves'] as $move): ?>
                    <li><?php echo ucfirst($move['move']['name']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Estadisticas -->
        <div class="details-section">
            <h2>Estadísticas</h2>
            <ul>
                <?php foreach ($pokemonDetails['stats'] as $stat): ?>
                    <li><?php echo ucfirst($stat['stat']['name']) . ': ' . $stat['base_stat']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

 
</body>
</html>
