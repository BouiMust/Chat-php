<?php
// Cette fonction compte une view à chaque vue d'une page du site

// Dossier contenant les vues
$directory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'datas' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

// Fichiers contenant les vues d'aujourd'hui, et celles du mois et année séléctionnés
$todayView = $directory . date('Y_m_d');

// Ajoute une vue pour aujourd'hui
// vérifie si fichier/vue existant -> on recupere la valeur, on incremente et sauvegarde
if (file_exists($todayView)) {
    $totalview = (int)file_get_contents($todayView);
    $totalview++;
    file_put_contents($todayView, $totalview);
} else {
    // Sinon -> on crée le fichier en ajoutant 1 et on sauvegarde
    file_put_contents($todayView, 1);
}
