<?php
// define : pour definir une constante
// Jours
define('JOURS', ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
// Creneaux
define('CRENEAUX', [
    [
        [8, 12],
        [14, 18]
    ],
    [
        [8, 12],
        [14, 18]
    ],
    [
        [8, 12],
        [14, 18]
    ],
    [
        [14, 18]
    ],
    [
        [8, 12]
    ],
    [],
    []
]);

// Affiche les jours et creneaux d'ouverture
function showCreneaux(array $jours, array $creneaux) {
    // Pour chaque jour
    foreach ($jours as $key => $jour)  {
        echo '<li>';
        echo $jour;
        if (!empty($creneaux[$key])) {
            $phrases = [];
            foreach ($creneaux[$key] as $creneau => $heure)  {
              $phrases[] = ' de <strong>' . $heure[0] . 'h</strong> à <strong>' . $heure[1] . 'h</strong>';
            }
            echo implode(' et ', $phrases) . '.</li>';
        } else {
            echo ' : Fermé.';
        }
    }
}