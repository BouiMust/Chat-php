<?php
// Page Menus : extraire le contenu d'un fichier (liste des menus pizza), de les formater et les afficher proprement

require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
$title = 'Menus';
// chemin fichier tsv (=contenu textuel avec séparation par tabulation)
$file = __DIR__ . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'pizza.txt';
// récupère le contenu du fichier tsv
$pizzas = file($file);
$array = [];
// explode pour couper les strings separés par tabulation
// puis trim pour enlever les espaces d'un string avant et apres, je met dans array
foreach ($pizzas as $k => $pizza) {
    $array[] = explode("\t", trim($pizza));
    // $array[] = str_getcsv(trim($pizza, "\t\n\r\0\x08,")); // pour fichier csv mais bug
}
?>

<?php require './components/header.php'; ?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1 class="text-center"> MENUS </h1>
        <div >
            <?php foreach ($array as $data) : ?>
                <div style='display:flex;justify-content:space-between;'>

                    <?php if (count($data) === 1) : ?>
                        <h2 style='color:red;'><?= $data[0]; ?></h2>
                    <?php else : ?>
                        <p><?= '<strong>Nom :</strong> ' . $data[0]; ?></p>
                        <p><?= '<strong>Ingrédients :</strong> ' .  $data[1]; ?></p>
                        <p><?= '<strong>Prix :</strong> ' .  $data[2] . ' €'; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</main>

<?php require './components/footer.php' ?>