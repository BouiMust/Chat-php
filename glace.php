<?php
// Page composer sa glace :
// Création d'un formulaire pour composer sa glace et calculer le prix total
// checkbox pour les parfums et supplements car on peut en choisir plusieurs
// bouton radio pour le support car un seul
// le form est généré selon le nombre de parfums, supports et suppl.

require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
// Importe les tableaux et fonctions
require './functions/functions_glace.php';
$title = 'Composer votre glace';
?>

<?php require './components/header.php' ?>

<main class="container row align-items-center" style='margin:auto;'>
    <div class="bg-warning p-5 rounded col-6" >
        <h1>Composer votre glace</h1>
        <!-- Formulaire -->
        <form action='/glace.php' method='GET'>

            <h3>Choisissez vos parfums :</h3>
            <!-- Affiche un checkbox pour chaque parfum -->
            <?php foreach($parfums as $parfum => $price) : ?>
                <div class='checkbox' style='color:#555' onmouseout="this.style.color='#555'" onmouseover="this.style.color='#000'">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET) ?>
                        <?= "$parfum - $price €" ?>
                    </label>
                </div>
            <?php endforeach ?>

            <h3>Choisissez votre support :</h3>
            <!-- un bouton radio pour chaque support -->
            <?php foreach($supports as $support => $price) : ?>
                <div class='radio' style='color:#555' onmouseout="this.style.color='#555'" onmouseover="this.style.color='#000'">
                    <label>
                        <?= radio('support', $support, $_GET) ?>
                        <?= "$support - $price €" ?>
                    </label>
                </div>
            <?php endforeach ?>

            <h3>Choisissez vos supplements :</h3>
            <!-- un checkbox pour chaque supplement -->
            <?php foreach($supplements as $supplement => $price) : ?>
                <div class='checkbox' style='color:#555' onmouseout="this.style.color='#555'" onmouseover="this.style.color='#000'">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= "$supplement - $price €" ?>
                    </label>
                </div>
            <?php endforeach ?>
            <div class="" style='display:flex;justify-content:center;'>
                <button type='submit' class='btn btn-primary'>Envoyer</button>
                <a href="/glace.php"><div class='btn btn-danger'>Réinitialiser</div></a>
            </div>
        </form>          
    </div>
    <div class="bg-info p-5 rounded col-5">
        <h2>Votre composition :</h2>
        <ul style='font-size:1.12em;color:#555;border:10px double #ffc107;border-radius: 5%'>
            <?php if (isset($_GET['parfum'])) : ?>
                <?php foreach($_GET['parfum'] as $parfum) : ?>
                    <li>
                        <?= $parfum ?>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
            <?php if (isset($_GET['support'])) : ?>
                <li>
                    <?= $_GET['support'] ?>
                </li>
            <?php endif ?>
            <?php if (isset($_GET['supplement'])) : ?>
                <?php foreach($_GET['supplement'] as $supplement) : ?>
                    <li>
                        <?= $supplement ?>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
            <?php if (!isset($_GET['parfum']) && !isset($_GET['support']) && !isset($_GET['supplement'])) : ?>
                <?= '<i>Vide ...</i>' ?>
            <?php endif ?>
        </ul>
        <h2>Prix à payer :</h2>
        <div style='color:#555;font-size:1.12em'>
            <?php
            // Affiche les prix
            echo "Prix total des parfums : $parfumsPrice €</br>"; 
            echo "Prix total du support : $supportPrice €</br>";
            echo "Prix total des supplements : $supplementsPrice €</br>";
            echo "Prix total à payer : $totalPrice €";
            ?></div>
        </div>
    </div>

</main>

<?php require './components/footer.php'?>