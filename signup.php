<?php
// Page signup : l'user crée son compte avec pseudo, mail et mdp
// Une fois le compte crée, l'user est automatiquement connecté

require_once './functions/auth2.php';
require_once './functions/functions_signup.php';

$title = 'S\'inscrire';
require './components/header.php';
?>

<main class="container">
    <div class="col-md-5 p-5 rounded center" style='text-align:center;margin:10px auto;background:#888;color:#FFF;'>
        <?php if (is_logged()) : ?>
            <h2 class="alert">Vous êtes déjà inscrits.</h2>
            <?= is_admin() ? '<div class="alert alert-danger"><strong> COMPTE ADMINISTATEUR </strong></div>' : '' ?>
            <a href="/functions/functions_logout.php"><button class='btn btn-secondary'>Se déconnecter</button></a>
        <?php else : ?>
            <h2>Créer votre compte</h2>
            <form action='/signup.php?action=register' method='post' class='form-inline'>
                <div class='col-md-5 form-group' style='margin: 15px auto;'>
                    <input type='text' name='pseudo' class='form-control' placeholder='Votre pseudo'>
                </div>
                <div class='col-md-5 form-group' style='margin: 15px auto;'>
                    <input type='email' name='email' class='form-control' placeholder='Votre email'>
                </div>
                <div class='col-md-5 form-group' style='margin: 15px auto;'>
                    <input type='password' name='password' class='form-control' placeholder='Votre mdp'>
                </div>
                <button type='submit' class='btn' style='background:#444;color:#FFF;'>Valider</button>
            </form>
        <?php endif ?>
        <p>
            <?php
            if ($error) echo '<div class="alert alert-danger">' . $error . '</div>';
            ?>
        </p>
    </div>
</main>


<?php require './components/footer.php' ?>