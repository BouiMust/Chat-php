<?php
// Page signup : l'user crée son compte avec pseudo, mail et mdp
// Une fois le compte crée, l'user est automatiquement connecté

require_once './functions/auth2.php';
require_once './functions/functions_signup.php';

$title = 'S\'inscrire';
require './components/header.php';
?>

<main class="container">
    <div class="row mx-auto bg-light p-3 rounded">

        <div class="col-12 py-1 mx-auto mb-3 text-center text-light rounded h4" style="background:<?= $theme ?>">CRÉER UN COMPTE</div>
        <div class="col-md-5 p-2 rounded center bg-light" style='text-align:center;margin:10px auto;'>
            <?php if (is_logged()) : ?>
                <h2 class="alert">Vous êtes déjà inscrits.</h2>
                <?= is_admin() ? '<div class="alert alert-danger"><strong>COMPTE ADMINISTATEUR</strong></div>' : '' ?>
                <a href="./functions/functions_logout.php"><button class='btn btn-secondary'>Se déconnecter</button></a>
            <?php else : ?>
                <form action='./signup.php?action=register' method='post' class='form-inline'>
                    <div class='col-md-5 form-group' style='margin: 15px auto;'>
                        <input type='text' name='pseudo' class='form-control text-center border-dark' placeholder='Votre pseudo'>
                    </div>
                    <div class='col-md-5 form-group' style='margin: 15px auto;'>
                        <input type='email' name='email' class='form-control text-center border-dark' placeholder='Votre email'>
                    </div>
                    <div class='col-md-5 form-group' style='margin: 15px auto;'>
                        <input type='password' name='password' class='form-control text-center border-dark' placeholder='Votre mdp'>
                    </div>
                    <button type='submit' class='btn btn-success'>Envoyer</button>
                </form>
            <?php endif ?>
            <p>
                <?php
                if ($error) echo '<div class="alert alert-danger">' . $error . '</div>';
                ?>
            </p>
        </div>
    </div>
</main>


<?php require './components/footer.php' ?>