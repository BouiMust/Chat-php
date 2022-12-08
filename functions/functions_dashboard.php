<?php

/********************* USERS LIST ******************* */

// Affiche les users inscris
// Récupère le fichier users
$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'users.txt';
$datas = file($file);
$users = unserialize($datas[0]);

// Affiche les users (trier par pseudo)
function show_users($users)
{
    foreach ($users as $user) {
        // si user = admin => background color
        $isAdmin = $user['pseudo'] === 'admin' && $user['email'] === 'admin@gmail.com';
        $buttonDelete = $isAdmin ? '' : "<a href='./functions/delete_account.php?email={$user['email']}'>
        <button class='delete-user btn btn-secondary' style='padding:2px;border-radius:5px;font-size:0.8em'>Désinscrire</button>
    </a>";
        $adminTheme = $isAdmin ?
            'style="background:#600;color:gold;"'
            : '';
        // get 4 last characters of password
        $partOfPassword = substr($user['password'], -4);
        echo "<tr $adminTheme>
            <td>{$user['id']}</td>
            <td>{$user['pseudo']}</td>
            <td>{$user['email']}</td>
            <td>************{$partOfPassword}</td>
            <td>{$buttonDelete}</td>
            </tr>";
    };
};


/********************* VIEWS ******************* */

define('YEARS', [
    (int)date('Y'),
    (int)date('Y') - 1,
    (int)date('Y') - 2,
    (int)date('Y') - 3,
    (int)date('Y') - 4
]);
define('MONTHS', [
    '01' => 'Janvier', // mettre 01 (str) ou 1 (int) ?
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
]);


// Dossier contenant les vues
$directory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

// Mois et année séléctionnés
// Si rien n'est séléctionné, alors mois et année en cours
$keyMonthSelected = !empty($_GET['month']) ? array_search($_GET['month'], MONTHS) : date('m');
$monthSelected = MONTHS[$keyMonthSelected];
$yearSelected = !empty($_GET['year']) ? $_GET['year'] : date('Y');


// Fichiers contenant les vues d'aujourd'hui, et celles du mois et année séléctionnés
$todayView = $directory . date('Y_m_d');
$timeSelectedView = glob($directory . $yearSelected . '_' . $keyMonthSelected . "*");
$yearSelectedView = glob($directory . $yearSelected . "*");


// Affiche les vues
function show_view($time)
{
    // Vérifie si c'est un tableau (ce n'est pas le cas de $todayView)
    if (is_array($time)) {
        $totalview = 0;
        foreach ($time as $day) {
            // Calcule (en additionnant les vues de chaque jour (fichier) concerné) et retourne le rslt
            $totalview += (int)file_get_contents($day);
        }
        return $totalview;
    }
    return (int)file_get_contents($time);
}
