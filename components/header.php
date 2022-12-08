<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <!-- Title -->
    <!-- isset permet de vérifier si une variable est définie (bool)-->
    <title>
      <?php if (isset($title)) : echo $title; else : echo 'Mon site'; endif ?>
    </title>
    <!-- Défini le theme selon le role de l'user -->
    <?php
      $theme = '#000';
      is_logged() && $theme = '#006';
      is_admin() && $theme = '#600';
    ?>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180"> -->
    <!-- <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png"> -->
    <!-- <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png"> -->
    <!-- <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json"> -->
    <!-- <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9"> -->
    <link rel="icon" href="./images/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <!-- Style perso -->
    <style>
      nav ul a {
        display: block;
        position: relative;
      }
      /* Fade in */
      nav ul a::after {
        content: '';
        position: absolute;
        bottom: 35px;
        left: 0;
        width: 100%;
        height: 0.1em;
        background-color: white;
        opacity: 0;
        transition: opacity 300ms, transform 300ms;
        transform: scale(0);
        transform-origin: center;
      }
      nav ul a:hover::after,
      nav ul a:focus::after {
        opacity: 1;
        transform: scale(1);
      }
      nav ul a::before {
        content: '';
        position: absolute;
        bottom: 0px;
        left: 0;
        width: 100%;
        height: 0.1em;
        background-color: white;
        opacity: 0;
        transition: opacity 300ms, transform 300ms;
        transform: scale(0);
        transform-origin: center;
      }
      nav ul a:hover::before,
      nav ul a:focus::before {
        opacity: 1;
        transform: scale(1);
      }
    </style>
  </head>

  <body style="background:<?= $theme ?>">
    <div class="container row mx-auto">

      <nav class="navbar navbar-expand-md navbar-dark py-3 sticky-top" style="background:<?= $theme ?>">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="./index.php">
              <img src="./images/logo.png" alt="Logo du site" style="width:65px;opacity:0.7;transition-duration:300ms;transform:scale(1);" onmouseout="this.style.opacity=0.7;this.style.transform='scale(1)'" onmouseover="this.style.opacity=1;this.style.transform='scale(1.1)'">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <?php require './components/navigation.php' ?>
              </ul>
              <!-- Barre de recherche -->
              <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> -->
            </div>
            <div class="dateNow text-light h6 p-1 pe-2"></div>
            <div class="timeNow text-light h6 border border-2 rounded p-1">--:--:--</div>
          </div>
      </nav>