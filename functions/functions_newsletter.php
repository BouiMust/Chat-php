<?php

// nom du fichier à créer, date du jour
$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y_m_d');
$error = null;
$success = null;

// Vérifie si l'email a été saisie dans le form post en cliquant sur le bouton (récuperable dans $_POST)
if (!empty($_GET['action']) && $_GET['action'] === 'subscribe') {
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        // Vérifie la validité de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Enregistre l'email avec un saut de ligne
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
            $success = 'Vous êtes inscris à la newsletter.';
        } else {
            $error = 'Email invalide.';
        }
    } else {
        // Si aucune saisie
        $error = 'Veuillez saisir votre email.';
    }
}