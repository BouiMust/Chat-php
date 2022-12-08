<?php
// LOGIN : connecte l'user quand il clique sur login

require_once '../functions/auth2.php';

// Message affiché en cas d'erreur
$error_msg = null;

// Vérifie l'user
// Vérifie s'il a rempli les champs du form post et s'il n'est pas déjà connecté
// vérifie si le pseudo et mdp sont bons
// cas 1 : l'user n'a pas entré toutes les infos -> erreur
// cas 2 : l'user est déjà connecté -> accueil
// cas 3 : il a entré un pseudo inexistant -> erreur
// cas 4 : il a entré un mdp invalide -> erreur
// cas 5 : il a entré son pseudo et mdp correct -> on connecte l'user -> accueil
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    if (is_logged()) {
        // $error_msg = 'Vous êtes déjà connecté.';
        // header("Location: /discussion.php?login-failed&error=$error_msg");
        exit();
    } else {
        // je check l'user dans la BDD
        $datas = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt');
        $users = unserialize($datas[0]);
        (bool) $pseudoIsValid = false;
        foreach ($users as $user) {
            // On vérifie le pseudo saisi avec ceux de la BDD
            if (check_pseudo($_POST['pseudo'], $user)) {
                // si pseudo trouvé, on vérifie le mdp
                $pseudoIsValid = true;
                if (check_password($_POST['password'], $user)) {
                    // si mdp valide -> user connecté -> accueil
                    log_user($user['pseudo'], $user['password'], $user['photo']);
                } else {
                    // sinon mdp invalide
                    $error_msg = 'Mot de passe incorrect';
                }
            }
        }
        $pseudoIsValid ?: $error_msg = 'Ce compte n\'existe pas.';
    }
} else {
    $error_msg = 'Tous les champs sont obligatoires';
}

// Vérifie le pseudo
function check_pseudo($pseudo, $user)
{
    return strtolower($pseudo) === $user['pseudo'];
}

// Vérifie le password
function check_password($password, $user)
{
    return password_verify($password, $user['password']);
}

// Connecte l'user
function log_user($pseudo, $password, $photo): void
{
    $user = [
        'pseudo' => $pseudo,
        'password' => $password,
        'photo' => $photo
    ];
    $_SESSION['user'] = $user;
    header('Location: ../index.php?login-successed');
    exit();
}


// Affiche à nouveau la page login en cas d'erreur
// $error_msg permet de transporter le message d'erreur lors de la redirection (récupérable avec $_GET)
header("Location: ../login.php?login-failed&error=$error_msg");
// exit('fin');
