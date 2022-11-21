<?php
// Tableaux
// checkbox
$parfums = [
    'Fraise' => 4,
    'Vanille' => 3,
    'Chocolat' => 5,
    'Pistache' => 6
];
// radio button
$supports = [
    'Pot' => 2,
    'Cornet' => 3,
    'Double cornets' => 4,
];
// checkbox
$supplements = [
    'Pépite' => 1,
    "Chantilly" => 0.5,
    'Amande' => 1.5,
    'Coco' => 0.5
];

// Fonction création de checkbox
// $name=nom attribué au checkbox (ex:parfum), $value=valeur du array(ex:vanille), $datas=$_GET
function checkbox(string $name, string $value, array $datas) {
    $attribute = '';
    // vérifie si array parf ou suppl existe dans $_GET et si la valeur est inclus (ex:vanille dans parfums), si oui -> checked
    if (isset($datas[$name]) && in_array($value, $datas[$name])) {
        $attribute .= 'checked';
    };
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attribute>
    HTML;
}

// Fonction création de bouton radio
function radio(string $name, string $value, array $datas) {
    $attribute = '';
    // vérifie si support existe dans $_GET et sa valeur est égale à $value (ex:pot), si oui -> checked
    if (isset($datas[$name]) && $value == $datas[$name]) {
        $attribute .= 'checked';
    };
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attribute>
    HTML;
}


$parfumsPrice = 0;
$supportPrice = 0;
$supplementsPrice = 0;
$totalPrice = 0;
// Calcul du prix des parfums
foreach ($parfums as $parfum => $price) {
    if (isset($_GET['parfum']) && in_array($parfum, $_GET['parfum'])) {
        $parfumsPrice += $price;
    };
}

// Calcul du prix du support
foreach ($supports as $support => $price) {
    if (isset($_GET['support']) && $support === $_GET['support']) {
        $supportPrice = $price;
    };
}

// Calcul du prix des supplements
foreach ($supplements as $supplement => $price) {
    if (isset($_GET['supplement']) && in_array($supplement, $_GET['supplement'])) {
        $supplementsPrice += $price;
    };
}

$totalPrice = $parfumsPrice + $supportPrice + $supplementsPrice;
        
?>