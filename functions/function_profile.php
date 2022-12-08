<?php
// POUR RECUPERER LES DONNEES EN SESSION
session_start();

$newFilePath = '';

// SI L'USER A UPLOADé UN FICHIER IMAGE
if (strtolower(explode("/", $_FILES['file']['type'])[0]) === 'image') {

    // NOM DU FICHIER A SAUVEGARDER
    $newFilePath = 'photos' . DIRECTORY_SEPARATOR . explode(".", $_FILES['file']['name'])[0] . '_' . strtolower($_SESSION['user']['pseudo']) . '.' . explode("/", $_FILES['file']['type'])[1];

    // SI EXTENSION SVG+XML
    if (strstr($newFilePath, "+xml")) {
        $newFilePath = explode("+xml", $newFilePath)[0];
    }
}

// EXECUTE LA FONCTION
savePhoto($newFilePath);

// SAUVAGARDE LE PATH EN SESSION
$_SESSION['user']['photo'] = $newFilePath;

// FONCTION SAUVEGARDE LA PHOTO UPLOADé DANS LE BCK
function savePhoto($newFilePath): void
{
    // SAUVEGARDE L'IMAGE
    // prend 2 params : chemin du fichier source et chemin + nom de sauvegarde dans le back
    move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__) . DIRECTORY_SEPARATOR . $newFilePath);

    // ENREGISTRE LE CHEMIN DE L'IMAGE DANS LES DONNEES DE L'USER
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt';
    $datas = file($file);
    $users = unserialize($datas[0]);
    foreach ($users as $key => $user) {
        if ($user['pseudo'] === $_SESSION['user']['pseudo']) {
            $users[$key]['photo'] = $newFilePath;
        }
    }

    // Sauvegarde le tableau user séréalisé
    file_put_contents($file, serialize($users));
}

// VERIFIER SI UNE PHOTO EST EN SESSION
// $photo = null;
// if (isset($_SESSION['user']['photo']) && $_SESSION['user']['photo'] !== '') {
//     $photo
// }


// AFFICHE LES DONNEES DU FICHIER UPLOADé
// var_dump($_FILES);

// ACCEDER AUX VALEUR DE CHAQUE CLES
// $tmpName = $_FILES['file']['tmp_name'];
// $name = $_FILES['file']['name'];
// $type = $_FILES['file']['type'];
// $size = $_FILES['file']['size'];
// $error = $_FILES['file']['error'];

// RECUPERER L'EXTENSION DU FICHIER
// explode("/", $_FILES['file']['type'])[1]



//Redirige
header("Location: ../profile.php");
exit();

/****************** */


// mettre la photo de l'user en session

// ensuite condition
// si isset(user[photo]) ET  !== ''
// alors affiche la photo
// sinon photo profile (defaut)