<?php
// Page newsletter: pour s'inscrire à la newsletter, l'user entre un email valide qui sera stocké dans le dossier 'emails'

require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
$title = 'Newsletter';
require './functions/functions_newsletter.php';
require './components/header.php';
?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1> NEWSLETTER </h1>
        <div >
        <form action='/newsletter.php?action=subscribe' method='POST' class='form-inline'>
            <div class='form-group'>
                <input type='text' name='email' class='form-control' placeholder='Saisir votre email'>
            </div>
            <button type='submit' class='btn btn-primary'>S'inscrire</button>
        </form>
        <?php if ($error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($success) : ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        </div>
    </div>
</main>

<?php require './components/footer.php' ?>