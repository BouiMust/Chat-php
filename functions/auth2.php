<?php
// Authentification : sert à authentifier l'user, à vérifier son authentification et à le deconnecter

// Mettre une auth avant delete ici ?

// Démarre une session si aucune session en cours, pour éviter d'ouvrir plusieurs
session_status() === 2 ? : session_start();

// Vérifie si l'user est connecté
function is_logged():bool {
    return !empty($_SESSION['user']);
}

// Vérifie si l'user connecté est Admin
// On retreouve les identifiants admin ici
function is_admin():bool {
    if (is_logged()) {
        $isAdmin = strtolower($_SESSION['user']['pseudo']) === 'admin' && $_SESSION['user']['password'] === '$2y$12$HGe6kHfY1mlugxnynTdnbOL4lcA1mYcs8k/Pa00cGGWIHyBOI.bZ.';
        return $isAdmin;
    }
    return false;
}

?>