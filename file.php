<?php
// Page file : accéder au chemin des fichiers, écrire et lire un fichier
require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
$title = 'File';
$file = __DIR__ . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'test.txt'; 
require __DIR__ . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1> FICHIER </h1>
        <div>
        <?= 'Nom du fichier : ' . $_SERVER['SCRIPT_NAME']?><br>
        <?= 'Nom du fichier (2) : ' . basename($_SERVER['SCRIPT_FILENAME'])?><br>
        <?= 'Chemin du script : ' . $_SERVER['SCRIPT_FILENAME'] ?><br>
        <?= 'Chemin du dossier courant : ' . __DIR__ . DIRECTORY_SEPARATOR ?><br>
        <?= 'Chemin du dossier parent : ' . dirname(__DIR__) . DIRECTORY_SEPARATOR ?><br>
        <?= 'Chemin du fichier : ' . __DIR__ . DIRECTORY_SEPARATOR . 'test.txt' ?><br>
        <?= 'Ecrire dans le fichier et valider pour sauvegarder : ' ?><br>
        <form action='/file.php' method='GET'>
            <textarea name="contain" cols="30" rows="2"><?php if (isset($_GET['contain'])) : echo $_GET['contain']; endif ?></textarea>
            <button type='submit'>Valider</button>
        </form>
        <?php if (isset($_GET['contain'])) : file_put_contents($file, $_GET['contain'], FILE_APPEND); endif ?>
        <?= 'Voici le contenu du fichier : ' . htmlentities(file_get_contents($file)); ?>
        </div>
    </div>
</main>
<?php require './components/footer.php' ?>