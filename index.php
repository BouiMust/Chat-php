<?php
// Authentification
require_once './functions/auth2.php';
// Fonction messages
require_once './functions/functions_messages.php';
// Titre de la page
$title = 'Page d\'accueil';
// Importe Header
require './components/header.php';
?>

<main class="container">
    <div class="row mx-auto bg-light p-3 rounded">

        <div class="col-12 py-1 mx-auto mb-3 text-center text-light rounded h4" style="background:<?= $theme ?>">ESPACE DISCUSSION</div>
        <?php if (array_key_exists('login-successed', $_GET) && is_logged()) echo '<p class="alert alert-success p-1 fs-5 text-center">Vous êtes connecté.</p>'; ?>
        <?php if (array_key_exists('registration-successed', $_GET)) echo '<p class="alert alert-success p-1 fs-5 text-center">Inscription réussie. Vous pouvez désormais vous connecter.</p>'; ?>
        <?php if (array_key_exists('logout-successed', $_GET) && !is_logged()) echo '<p class="alert alert-success p-1 fs-5 text-center">Vous venez de vous déconnecter.</p>'; ?>

        <div class="row mx-auto">

            <!-- BLOC ASIDE -->
            <div class="col-3 bg-light py-2 rounded border border-1 border-primary shadow position-fixed" style="min-height:260px">
                <p class="text-center text-white bg-dark py-2 m-0">Nouveau message</p>
                <div class="my-1">
                    <form action='' method='post' class='form-inline'>
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <!-- PHOTO PROFILE -->
                                <img class="rounded" src="<?= isset($_SESSION['user']['photo']) && $_SESSION['user']['photo'] !== '' ? $_SESSION['user']['photo'] : './images/profile.png' ?>" alt="photo de profil" width="40px">
                                <strong><?= is_logged() ? $_SESSION['user']['pseudo'] : 'inconnu' ?></strong>
                            </div>
                            <button type="submit" class="btn btn-success border-dark px-4">Envoyer</button>
                        </div>
                        <div class="mt-1">
                            <textarea class="border-dark w-100" name="message" id="message" rows="5" placeholder="Votre message ici..."></textarea>
                        </div>
                    </form>
                </div>
                <?php if ($error) echo "<div class='alert alert-danger p-1'>$error</div>" ?>
            </div>

            <!-- BLOC DES MESSAGES -->
            <div class="col-8 rounded p-2 text-break" style="min-height:385px;position:relative;left:400px;background:<?= $theme ?>">

                <?php if (!$noMessage) : ?>
                    <?php foreach (array_reverse($messages) as $message) : ?>
                        <div class="col-11 bg-light mb-2 pb-1 rounded border border-1 border-primary shadow">
                            <div class="row text-center mx-auto pb-1">
                                <div class="col-6 d-flex align-items-center">
                                    <div>Envoyé par <strong><?= $message['pseudo'] ?></strong></div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <div>le <?= $message['date'] ?> à <?= $message['time'] ?></div>
                                </div>
                            </div>
                            <div class="border-top border-1 border-primary px-2 py-2">
                                <div class="col text-break" style="line-height:100%"><?= nl2br(htmlentities(str_replace('\n', "\n", $message['text']))) ?></div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class='col-11 text-light h4'><?= $noMessage ?></div>
                <?php endif ?>

                <!-- TEMPLATE MESSAGE -->
                <!-- <div class="col-11 bg-light mb-2 rounded border border-1 border-primary shadow">
                    <div class="row text-center mx-auto pb-1">
                        <div class="col-6 d-flex align-items-center">
                            <div>Envoyé par <strong>$pseudo</strong></div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <div>le $dateMessage à $timeMessage</div>
                        </div>
                    </div>
                    <div class="border-top border-1 border-primary px-2 py-2">
                        <div class="col text-break" style="line-height:100%">$text</div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</main>


<?php require './components/footer.php' ?>