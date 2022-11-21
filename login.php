<?php
// Page login : l'user se connecte avec son pseudo et mdp, ils sont enregistrés durant toute la session

require_once './functions/auth2.php';
$title = 'Page de connexion';
require './components/header.php';
?>

<main class="container">
    <div class="col-md-5 p-5 rounded center" style='text-align:center;margin:10px auto;background:#888;color:#FFF;'>
        <?php if (is_logged()) : ?>
            <h2 class="alert">Vous êtes déjà connecté.</h2>
            <?= is_admin() ? '<div class="alert alert-danger"><strong> COMPTE ADMINISTATEUR </strong></div>' : '' ?>
            <a href="/functions/functions_logout.php"><button class='btn btn-secondary'>Se déconnecter</button></a>
        <?php else : ?>
            <h2>Connexion</h2>
            <form action='/functions/functions_login.php' method='post' class='form-inline'>
                <div class='col-md-5 form-group' style='margin: 15px auto;'>
                    <input type='text' name='pseudo' class='form-control' placeholder='Votre pseudo'>
                </div>
                <div class='col-md-5 form-group' style='margin: 15px auto;'>
                    <input type='password' name='password' class='form-control' placeholder='Votre mdp'>
                </div>
                <button type='submit' class='btn btn-primary'>Valider</button>
            </form>
            <?php endif ?>
            <p>
                <?php
                if (isset($_GET['error'])) echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
                ?>
            </p>
    </div>
</main>


<?php require './components/footer.php' ?>