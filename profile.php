<?php 
// Page Profile : utilisation des cookies, l'user se connecte, on crée un cookie qui sera stocké dans le navigateur pour que l'user reste connecté, si il se deconnecte, le cookie sera supprimé. Idem pour la date de naissance, l'user entre sa date, on calcul son age puis on determine si il a droit d'acces au contenu (>=18)
require_once './functions/auth2.php';
if (!is_logged()) {
    header('Location: ./index.php?unauthorized');
    exit();
}
require './functions/functions_profile.php';
?>

<?php require './components/header.php' ?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <h1> PROFILE </h1>
        <div>
            <!-- vérifie si un user est connecté -->
            <?php if ($username) : ?>
                <div class="alert alert-success"><?= 'Bonjour ' . htmlentities($username) ?></div>
                <a href="/profile.php?action=reset-username"><button class='btn btn-secondary'>Réinitialiser</button></a>
            <?php else : ?>
                <form action='' method='post' class='form-inline'>
                    <div class='form-group'>
                        <input type='text' name='username' class='form-control' placeholder='Saisir votre nom'>
                    </div>
                    <button type='submit' class='btn btn-primary'>Se connecter</button>
                </form>
            <?php endif; ?>
            <!-- vérifie l'année de l'user -->
            <p>Entrer votre date de naissance (entre 1919 et 2010) :</p>
            <form action='' method='post' class='form-inline'>
                <div class='form-group'>
                    <!-- méthode avec input -->
                    <!-- <input type='number' name='year' class='form-control' min=1919 max=2010 value=<?php if (!empty($_POST['year'])) : echo htmlentities($_POST['year']); else : echo 2000; endif;?>> -->
                    <!-- méthode avec select -->
                    <select name="year" class='form-control'>
                        <?php for ($i = 2019; $i >= 1919; $i--) : ?> 
                        <option value=<?=$i?>><?=$i?></option>
                        <?php endfor ?>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Valider</button>
            </form>
            <!-- Vérifie si l'age est present et + de 18 -->
            <?php if ($age) : ?>
                <a href="/profile.php?action=reset-age"><button class='btn btn-secondary'>Réinitialiser</button></a>
                <?php if ($age >= 18) : ?>
                    <div class="alert alert-success"><?= 'Accès autorisé.' ?></div>
                <?php else : ?>
                    <div class="alert alert-danger"><?= 'Accès refusé.' ?></div>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
</main>
<?php
?>
<?php require './components/footer.php' ?>