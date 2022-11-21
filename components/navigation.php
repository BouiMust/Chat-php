<!-- Affiche les liens dans le header, visibilité des liens en fonction de l'auth (visiteur, membre, admin)-->

<?php
// Fonction qui génère la nav
function nav_item(string $link, string $title): string {
    $isActive = '';
    if ($_SERVER['SCRIPT_NAME'] === $link) : $isActive = 'active'; endif;
    return <<<HTML
    <li class="nav-item">
        <a class="nav-link {$isActive}" href=".{$link}">$title</a>
    </li>
    HTML;
  }
?>

<!-- on pourrait créer un tableau qui regroupe chaque lien de nav puis créer une boucle pour afficher chaque menu (DRY)
on pourrait rajouter une des 3 clés pour chaque lien : all, users, admin
l'user est identifié avec son cookie, il aura un droit d'accès selon son rôle)-->

<!-- Liens visibles par tous -->
<?= nav_item('/index.php', 'Accueil') ?>
<?= nav_item('/contact.php', 'Contact') ?>


<!-- si l'user n'est pas connecté -->
<?php if (!is_logged()) : ?>
    <?= nav_item('/login.php', 'Connexion') ?>
    <?= nav_item('/signup.php', 'Inscription') ?>
<?php endif ?>


<!-- si l'user est connecté -->
<?php if (is_logged()) : ?>
    <?= nav_item('/jeu.php', 'Jeu') ?>
    <?= nav_item('/glace.php', 'Composer sa glace') ?>
    <?= nav_item('/file.php', 'Fichier') ?>
    <?= nav_item('/menus.php', 'Menus') ?>
    <?= nav_item('/newsletter.php', 'Newsletter') ?>
    <?= nav_item('/profile.php', 'Profile') ?>
    <?= nav_item('/session.php', 'Session') ?>
    <?= '<a href="/functions/functions_logout.php"><button class="btn btn-secondary">Déconnexion</button></a>' ?>
<?php endif ?>


<!-- si l'user est Admin -->
<?php if (is_admin()) : ?>
    <?= nav_item('/dashboard.php', '<span style="color:gold">Tableau de bord</span>') ?>
<?php endif ?>
