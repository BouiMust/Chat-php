<?php

// met username sur null par défaut(c-a-d aucun user)
// username = nom saisie par l'user
$username = null;

// vérifife si logout est dans les param URL (en utilisant $_GET)
if (!empty($_GET['action']) && $_GET['action'] === 'reset-username') {
    // on supprime le cookie pour le reste du code
    unset($_COOKIE['username']);
    // on l'écrase par un cookie périmé/depassé pour qu'il soit supprimé instantannement
    setcookie('username', '', time() - 10);
}

// vérifie si le cookie est présent
if (!empty($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}

// vérifie si le nom saisie dans le form post est présent
if (!empty($_POST['username'])) {
    setcookie('username', $_POST['username']);
    $username = $_POST['username'];
}

/************************** */

// met year sur null par défaut
// year = année de naissance saisie par l'user
$age = null;

// vérifife si reset (l'age) est dans les param URL (en utilisant $_GET)
if (!empty($_GET['action']) && $_GET['action'] === 'reset-age') {
    // on supprime le cookie pour le reste du code
    unset($_COOKIE['age']);
    // on l'écrase par un cookie périmé/depassé pour qu'il soit supprimé instantannement
    setcookie('age', '', time() - 10);
}

// vérifie si l'année est present dans le cookie
if (!empty($_COOKIE['age'])) {
    $age = $_COOKIE['age'];
}

// vérifie si l'année est saisie dans le form post
if (!empty($_POST['year'])) {
    // on calcul l'age de l'user
    $age = (int)date('Y') - (int)$_POST['year'];
    // on le stocke
    setcookie('age', $age);
}

?>