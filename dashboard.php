<?php
// Page dashboard : visualiser le nombre de vues (journalier, mensuel ou annuel) et la liste des users
// On peut selectionner l'année et le mois
// Le but est de calculer le nombre de vues (stockées dans les fichiers dans /datas) et de les afficher
// 1 fichier = 1 jour
// Les fichiers sont nommés chronologiquement (année_mois_jour) pour une bonne organisation et lecture des fichiers
// glob : pattern expression, permet de rassembler des variables qui ont un pattern/des caract en commun/identique
// ex: 2022_01 et 2022_12 => '2022'
// Cette page ne doit être accessible que par l'admin
require_once './functions/auth2.php';

if (!is_admin()) {
    header('Location: ./index.php?forbidden');
    exit();
}

$title = 'Tableau de bord';
?>
<!---------------- LOGIQUE  -------------->

<?php require './functions/functions_dashboard.php'; ?>

<!--------------- AFFICHAGE  -------------->

<?php require './components/header.php' ?>
<main class="container">
    <div class="row mx-auto bg-light p-3 rounded">
        <div class="col-12 py-1 mx-auto mb-3 text-center text-light rounded h4" style="background:<?= $theme ?>">TABLEAU DE BORD</div>
        <?php if (array_key_exists('account-deleted', $_GET)) echo '<p class="alert alert-success p-1 fs-4 text-center">Compte utilisateur supprimé.</p>'; ?>
        <?php if (array_key_exists('administrator', $_GET)) echo '<p class="alert alert-danger p-1 fs-4 text-center">Vous ne pouvez pas supprimer votre compte.</p>'; ?>

        <!-- BLOC USER -->
        <div class="p-5 rounded row" style="text-align:center;">
            <h1>Nombre d'utilisateurs inscrits</h1>
            <h2 class='col-md-5' style='border:1px solid;margin:auto;'><?= count($users) ?></h2>
            <h1>Liste des utilisateurs</h1>
            <table class='col-md-9' style='margin:auto;border:1px solid'>
                <tr style='border:1px solid;'>
                    <th>IDENTIFIANT</th>
                    <th>PSEUDO</th> <!-- header -->
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th></th>
                </tr>
                <?= show_users($users) ?>
            </table>
        </div>

        <!-- BLOC VIEW -->
        <div class='col-md-4'>
            <form action='' method='get' class='form-inline'>
                <div class='form-group' style='margin:10px;padding:5px;background:#EEE;'>
                    <span style='font-weight:bold;color:#58A;'>Séléctionner une année</span>
                    <?php foreach (YEARS as $year) : ?>
                        <?php $isSelected = $year === (int)$yearSelected ?>
                        <div class="radio" <?php if ($isSelected) : echo 'style="background:#ADF;"';
                                            endif ?>>
                            <label>
                                <input type='radio' name='year' value=<?= $year ?> <?php if ($isSelected) : echo 'checked';
                                                                                    endif ?>>
                                <?= $year ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class='form-group' style='margin:10px;padding:5px;background:#EEE;'>
                    <span style='font-weight:bold;color:#58A;'>Séléctionner un mois</span>
                    <?php foreach (MONTHS as $month) : ?>
                        <?php $isSelected = $month === $monthSelected ?>
                        <div class="radio" <?php if ($isSelected) : echo 'style="background:#ADF;"';
                                            endif ?>>
                            <label>
                                <input type='radio' name='month' value=<?= $month ?> <?php if ($isSelected) : echo 'checked';
                                                                                        endif ?>>
                                <?= $month ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
                <button type='submit' class='btn btn-primary col-md-12'>Valider</button>
            </form>
        </div>
        <div class='col-md-8' style='color:#479;'>
            <div>
                <h2>Nombre de vues aujourd'hui (<?= date('d/m/Y') ?>)</h2>
                <p style='font-size:2em;'><strong> <?= show_view($todayView) ?></strong></p>
            </div>
            <div>
                <h2>Nombre de vues en <?= $monthSelected . ' ' . $yearSelected ?></h2>
                <p style='font-size:2em;'><strong> <?= show_view($timeSelectedView) ?></strong></p>
            </div>
            <div>
                <h2>Nombre de vues en <?= $yearSelected ?></h2>
                <p style='font-size:2em;'><strong> <?= show_view($yearSelectedView) ?></strong></p>
            </div>
            <div>
                <h2>Moyenne de vues en <?= $yearSelected ?> (par jour)</h2>
                <p style='font-size:2em;'><strong> <?= round(show_view($yearSelectedView) / 365, 2) ?></strong></p>
            </div>
        </div>
    </div>


</main>

<?php require './components/footer.php' ?>