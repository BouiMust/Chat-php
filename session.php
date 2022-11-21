<?php
// Page session : on utilise une session pour persister une session utilisateur, ça fonctionne comme un cookie.
// Les données de sessions ne peuvent pas être altéré et on peut stocker tout type de données.
// La session expire quand le navigateur est fermé, donc les données persistent durant le tps de la visite.
require_once './functions/functions_session.php';
?>

<?php require './components/header.php'; ?>

<main class="container">
    <div class="bg-light p-5 rounded" style='text-align:center;margin:10px auto;'>
        <h1> SESSION </h1>
        <h2> Une session est ouverte. </h2>
        <form action='./session.php?action=login' method='post' class='form-inline'>
            <div class='col-md-5 form-group' style='margin: 15px auto;'>
                <input type='text' name='pseudo' class='form-control' placeholder='Votre pseudo'>
            </div>
            <div class='col-md-5 form-group' style='margin: 15px auto;'>
                <input type='password' name='password' class='form-control' placeholder='Votre mdp'>
            </div>
            <button type='submit' class='btn btn-primary'>Se connecter</button>
            <a href="/session.php?action=logout" class="btn btn-secondary">Se déconnecter</a>
        </form>
        <div>
            <?php
            if ($success_msg) echo "<div class='alert alert-success'> $success_msg </div>";
            if ($error_msg) echo "<div class='alert alert-danger'> $error_msg </div>";
            if (!empty($_SESSION['user'])) {
                echo 'Voici les données de session : ' . '<br>';
                print_r($_SESSION['user']);
                echo '<br>';
            } else {
                echo 'Aucune donnée de session...' . '<br>';
            }
                echo 'Etat de la session : ' . session_status();
            ?>
        </div>
    </div>
</main>

<?php require './components/footer.php' ?>