<?php
// LOGOUT : deconnecte l'user quand il clique sur logout

// require_once './auth2.php';
session_start();
unset($_SESSION['user']);
$success_msg = 'Déconnecté !';
header('Location: /index.php?logout-successed');
exit();
