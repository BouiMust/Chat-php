<?php
// Authentification
require_once './functions/auth2.php';

// Récupérer les données de l'user en utilisant le pseudo dans SESSION
// seulement les données necessaires à la page
/******************* */

$title = 'Mon profil';
require './components/header.php';
?>

<main class="container">
    <div class="row mx-auto bg-light p-3 rounded">
        <div class="col-12 py-1 mx-auto mb-3 text-center text-light rounded h4" style="background:<?= $theme ?>">MON PROFIL</div>
        <div class="row my-5">
            <?php if (!is_logged()) : ?>
                <div class="h3 text-center">Vous n'êtes pas connecté.</div>
            <?php else : ?>
                <div class="col d-flex justify-content-end">
                    <div class="text-center">

                        <!-- PHOTO -->
                        <img class="rounded border shadow" src="<?= isset($_SESSION['user']['photo']) && $_SESSION['user']['photo'] !== '' ? $_SESSION['user']['photo'] : './images/profile.png' ?>" alt="photo de profil" width="250px">

                        <!-- CHARGER UNE PHOTO -->
                        <form action="./functions/function_profile.php" method="POST" enctype="multipart/form-data" class="row">
                            <label for="file" class="file btn btn-light w-50 border border-2">Charger une photo</label>
                            <input type="file" name="file" id="file" hidden />
                            <button type="submit" class="file btn btn-light w-50 border border-2">Enregistrer</button>
                        </form>

                    </div>
                </div>
                <div class="col ps-4 h4 mx-auto">
                    <div>Pseudo : <span class="text-danger"><?= $_SESSION['user']['pseudo'] ?></span></div>
                    <div class="opacity-25">Email : <span class="text-danger">user@gmail.com</span></div>
                    <div>Mot de passe : <span class="text-danger"><?= '********' . substr($_SESSION['user']['password'], -4) ?></span></div>
                    <div class="opacity-25">Identifiant : <span class="text-danger">azertyuqsdfgtfhy</span></div>
                    <div class="opacity-25">Nom : <span class="text-danger">paul</span></div>
                    <div class="opacity-25">Prénom : <span class="text-danger">emb</span></div>
                    <div class="opacity-25">Age : <span class="text-danger">31</span></div>
                    <div class="opacity-25">Ville : <span class="text-danger">Versailles</span></div>
                    <div class="">Statut :
                        <?php if (is_admin()) : ?>
                            <span class="text-white fw-bold rounded px-3" style="background:#933">Administrateur</span>
                        <?php else : ?>
                            <span class="text-white fw-bold rounded px-3" style="background:#44A">Membre</span>
                        <?php endif ?>
                    </div>
                    <div class="opacity-25">Date d'inscription : <span class="text-danger"><?= date('d/m/Y') ?></span></div>
                </div>
            <?php endif ?>
        </div>
    </div>
</main>

<?php require './components/footer.php' ?>