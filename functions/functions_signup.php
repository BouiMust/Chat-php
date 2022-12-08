<?php
// Ce composant permet l'inscription de l'user : pseudo, email et mdp obligatoires.
// les données saisies sont vérifiées
// le fichier 'users' dans le dossier 'datas' stocke les users enregistrés
// une fois inscris, l'user est enregistré dans ce fichier
// l'user ne peut s'inscrire si l'email existe déjà

// Fichier users
$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt';
$error = null;

// VALIDATION FORMULAIRE
// Vérifie si les données sont saisies dans le form quand il clique sur le bouton (récupèrable dans $_POST)
// Ce code s'execute seulement si tous les champs sont remplis, sinon msg error
if (!empty($_GET['action']) && $_GET['action'] === 'register') {
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        if (!email_is_valid($_POST['email'])) {
            $error = 'Email invalide.';
        } elseif (!pseudo_is_unique($_POST['pseudo'])) {
            $error = 'Ce pseudo existe déjà.';
        } elseif (!email_is_unique($_POST['email'])) {
            $error = 'Cette adresse mail existe déjà.';
        } else {
            register_user($file);
            // connecter l'user après inscription ?
            // include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'functions.login.php';
            // log_user($_POST['pseudo'], $_POST['password']);
        }
    } else {
        $error = 'Tous les champs sont obligatoires.';
    }
}

// EMAIL FORMAT VALIDE
// Vérifie si l'email a un format valide
function email_is_valid($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// PSEUDO UNIQUE
// Vérifie si le pseudo n'a pas déjà été utilisé
function pseudo_is_unique($pseudo): bool
{
    // Récuperère le fichier avec les users et déserealise chaque datas
    // On compare l'email avec ceux des users inscrits
    $datas = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt');
    $users = unserialize($datas[0]);
    foreach ($users as $user) {
        if (strtolower($pseudo) === $user['pseudo']) {
            return false;
        }
    }
    return true;
}

// EMAIL UNIQUE
// Vérifie si l'email n'a pas déjà été utilisé
function email_is_unique($email): bool
{
    $datas = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt');
    $users = unserialize($datas[0]);
    foreach ($users as $user) {
        if (strtolower($email) === $user['email']) {
            return false;
        }
    }
    return true;
}

// ENREGISTRE L'USER avec son mdp crypté
function register_user($file): void
{
    $datas = file($file);
    $users = unserialize($datas[0]);
    $user = [
        'id' => bin2hex(random_bytes(15)),
        'pseudo' => strtolower($_POST['pseudo']),
        'email' => strtolower($_POST['email']),
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]),
        'photo' => ''
    ];
    $users[] = $user;
    file_put_contents($file, serialize($users));
    header("Location: index.php?registration-successed");
    exit();
}
