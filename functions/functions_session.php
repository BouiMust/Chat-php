<?php
// Ancien fichier auth qui regroupe l'authentification, la connexion et la deconnexion

// Démarre une session si aucune session en cours, pour éviter d'ouvrir plusieurs
session_status() === 2 ? : session_start();

// Message affiché après une action
$success_msg = null;
$error_msg = null;

// LOGIN : connecte l'user quand il clique sur login
// Vérifie s'il a rempli les champs du form post et s'il n'est pas déjà connecté
// vérifie si le pseudo et mdp sont bons
// cas 1 : l'user n'a pas entré toutes les infos -> erreur
// cas 2 : l'user est déjà connecté -> erreur
// cas 3 : il a entré un pseudo inexistant -> erreur
// cas 4 : il a entré un mdp invalide -> erreur
// cas 5 : il a entré son pseudo et mdp correct -> on connecte l'user
if (!empty($_GET['action']) && $_GET['action'] === 'login') {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        if (is_logged()) {
            $error_msg = 'Vous êtes déjà connecté.';
        } else {
            // je check l'user dans la BDD
            $datas = file(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users');
            $members = unserialize($datas[0]);
            (bool) $pseudoIsValid = false;
            foreach($members as $member) {
                // On compare le pseudo saisi avec ceux de la BDD
                if ($_POST['pseudo'] === $member['pseudo']) {
                    // si pseudo trouvé, on compare le mdp
                    $pseudoIsValid = true;
                    if (password_verify($_POST['password'], $member['password'])) {
                        // si mdp valide -> user connecté
                        log_user($_POST['pseudo'], $_POST['password']);
                        $success_msg = 'Connecté !';
                    } else {
                        // sinon mdp invalide
                        $error_msg = 'Mot de passe incorrect';
                    }
                }
            }
            $pseudoIsValid ? : $error_msg = 'Ce compte n\'existe pas.';
        }
    } else {
        $error_msg = 'Tous les champs sont obligatoires';
    }
}


// Vérifie si l'user est connecté
function is_logged():bool {
    return !empty($_SESSION['user']);
}


// Connecte l'user
function log_user($pseudo, $password):void {
    $user = [
        'pseudo' => $pseudo,
        'password' => $password
    ];
    $_SESSION['user'] = $user;
}

// Deconnecte l'user
// Vérifie s'il est connecté
if (!empty($_GET['action']) && $_GET['action'] === 'logout') {
    if (empty($_SESSION['user'])) {
        $error_msg = 'Vous êtes déjà déconnecté.';
    } else {
        unset($_SESSION['user']);
        $success_msg = 'Déconnecté !';
    }
}

// Vérifie si l'user connecté est Admin
function is_admin():bool {
    if (is_logged()) {
        $isAdmin = $_SESSION['user']['pseudo'] === 'Admin' && $_SESSION['user']['password'] === 'aaaa';
        return $isAdmin;
    }
    return false;
}