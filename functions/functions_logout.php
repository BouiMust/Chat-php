<?php
// LOGOUT : deconnecte l'user quand il clique sur logout

// démarre la session pour accéder aux datas de session
session_start();
// supprime les données de session
unset($_SESSION['user']);
// on peut aussi utiliser session_destroy(), ça détruit toutes les données associées à la session courante
// session_destroy();
$success_msg = 'Déconnecté !';
header('Location: ../index.php?logout-successed');
exit();
