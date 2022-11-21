<?php
require_once './functions/auth2.php';
// Variable titre qui dépend de la page (à placer avant le composant header)
$title = 'Page d\'accueil';
// Importe Header
require './components/header.php';
?>

<main class="container">
  <div class="bg-light p-5 rounded">
    <?php if (array_key_exists('login-successed', $_GET) && is_logged()) echo '<p class="alert alert-success">Vous êtes connecté.</p>'; ?>
    <?php if (array_key_exists('registration-successed', $_GET)) echo '<p class="alert alert-success">Inscription réussie. Vous pouvez désormais vous connecter.</p>'; ?>
    <?php if (array_key_exists('logout-successed', $_GET) && !is_logged()) echo '<p class="alert alert-success">Vous venez de vous déconnecter.</p>'; ?>
    <h1>Accueil</h1>
    <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio hic esse, aperiam quasi quia ullam, commodi quis sunt perspiciatis tempore, omnis velit quo veritatis tempora quidem fugiat blanditiis maxime adipisci. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia a incidunt amet, saepe ab eligendi aut illum nesciunt excepturi quis quos quasi voluptas aperiam esse iure et doloremque. Ipsum, architecto! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio veritatis nulla error dicta? Optio saepe incidunt illum delectus expedita, nesciunt magnam fugit corporis atque consequuntur eius eaque ipsa dolorem nam.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio hic esse, aperiam quasi quia ullam, commodi quis sunt perspiciatis tempore, omnis velit quo veritatis tempora quidem fugiat blanditiis maxime adipisci. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia a incidunt amet, saepe ab eligendi aut illum nesciunt excepturi quis quos quasi voluptas aperiam esse iure et doloremque. Ipsum, architecto! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio veritatis nulla error dicta? Optio saepe incidunt illum delectus expedita, nesciunt magnam fugit corporis atque consequuntur eius eaque ipsa dolorem nam.</p>
    <a class="btn btn-lg btn-primary" href=# role="button">Valider</a>
  </div>
</main>


<?php require './components/footer.php' ?>

<!-- 
Ce projet à pour but de me familiariser avec le langage PHP
- Talk me more : réseau de discussion
- dans le jeu, rajouter palindrome
- classer les utilisateurs par ordre alpha
- operation CRUD user
- operation CRUD post
- validation pseudo et mdp coté front et back

-->