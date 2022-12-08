<?php
// Composant pour la suppression d'un (compte) user

// Retourne au tableau de bord si c'est un compte Admin
// if (strtolower($_GET['email']) === 'admin@gmail.com') {
//     header('Location: ../dashboard.php?administrator');
//     exit();
// }

// Récupère le fichier users
$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt';

// Récupère les datas serealisés du fichier
$datas = file($file);

// Déséréalise les datas
// Chaque elt du tableau est un user
$users = unserialize($datas[0]);

// Cherche l'email qui correspond et supprime le compte user
// Autre technique : array_search
foreach($users as $key => $user) {
    if ($_GET['email'] === $user['email']) {
        array_splice($users, $key, 1,);
        break;
    }
}

// Sauvegarde le tableau user séréalisé
file_put_contents($file, serialize($users));

// Retourne au tableau de bord
header('Location: ../dashboard.php?account-deleted');
exit();
?>