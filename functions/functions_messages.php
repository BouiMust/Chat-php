<?php

// Dossier contenant les messages
$directory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR;

// Mon fichier messages
$file = $directory . 'messages.txt';

// Si le fichier n'existe pas -> il sera crée
if (!file_exists($file)) file_put_contents($file, '');

// Mes message d'erreur (si erreur)
$error = null;
$noMessage = null;

// Quand l'utilisateur appuie sur le bouton Envoyer
if (isset($_POST['message'])) {
    // si le message est vide
    if ($_POST['message'] === '') {
        $error = 'Veuillez entrer votre message';
    } else {

        // sinon récupère les données du message et de l'user
        $text = str_replace("\n", '\n', $_POST['message']);
        $pseudo = is_logged() ? $_SESSION['user']['pseudo'] : 'inconnu';
        $dateMessage = date('d/m/Y');
        $timeMessage = (date('H') + 1) . ':' . date('i');

        // Message minifié qui sera enregistré
        $message = [
            'pseudo' => $pseudo,
            'text' => $text,
            'date' => $dateMessage,
            'time' => $timeMessage,
        ];
        // récupère les datas du fichier
        $datas = file($file);

        // convertis les datas en tableau de messages
        $messages = unserialize($datas[0]);

        // J'ajoute le message à mon tableau
        $messages[] = $message;

        // Je sauvegarde mon tableau dans mon fichier
        file_put_contents($file, serialize($messages));
        header("Location: index.php");
        exit();
    }
}


// Si le fichier contient au moins un message
if (file_get_contents($file)) {
    // récupère les datas du fichier
    $datas = file($file);
    // convertis les datas en tableau de messages
    $messages = unserialize($datas[0]);
} else {
    $noMessage = 'Aucun message...';
}
