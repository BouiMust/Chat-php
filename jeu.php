<?php
// Page Jeu : Deviner un chiffre

// séparer la logique de l'affichage
// la logique se trouve ici, au début du fichier

require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
$title = 'Jeu';

$aDeviner = 15;
$error = null;
$success = null;
$value = null;
if (!empty($_GET['chiffre'])) {
    $value = (int)$_GET['chiffre'];
    if ($value < $aDeviner) {
        $error = 'Trop petit';        
    } elseif ($value > $aDeviner) {
        $error = 'Trop grand';
    } elseif ($value == $aDeviner) {
        $success = "Bravo, vous avez gagné !";
    }
}
?>

<?php require './components/header.php' ?>

<main class="container">
    <div class="bg-light p-5 rounded">
<!-- GET/POST et URL params -->
<!-- On saisie une valeur dans un input du form, une fois le form soumis, la valeur est passée dans l'URL et on la recupere avec $_GET -->
<!-- On peut saisir plusieurs valeurs dans le formulaire -->
<!-- POST fonctionne comme GET mais les valeurs saisies n'apparaissent pas dans l'URL --> 
        <h1> JEU : deviner un nombre</h1>
        <form action='/jeu.php' method='GET'>
        <div class='form-group'>
            <input type='number' name='chiffre' class='form-control' placeholder='Saisir un chiffre entre 0 et 20' value="<?php if (isset($_GET['chiffre'])) : echo htmlentities($_GET['chiffre']); endif?>">
        </div>
        <!-- // name va permettre d'identifier le champs, on peut le voir quand le formulaire est soumis, il apparait dans l'URL -->
        <button type='submit' class='btn btn-primary'>Deviner</button>
        </form>
        <?php if ($error) : ?>
            <div class='alert alert-danger'>
                <?= $error ?>
            </div>
        <?php elseif ($success) : ?>
            <div class='alert alert-success'>
                <?= $success ?>
            </div>
        <?php endif ?>
    </div>
</main>
<?php
require './components/footer.php';
?>