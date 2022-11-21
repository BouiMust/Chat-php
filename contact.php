<?php
require_once './functions/auth2.php';
// Variables dépendantes de la page
$title = 'Page de contact';
// Header
require './components/header.php';
// Importe les const JOURS et CRENEAUX
require_once './functions/functions_creneaux.php';
?>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1><u>Contact</u> :</h1>
    <div class="row">
      <div class="col-6">
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus, officia. Ipsum voluptates ab vero molestias incidunt, inventore earum id, eaque, doloribus ut dolores architecto mollitia at esse adipisci voluptatibus consequatur.</p>
        <div>
          <h1><u>Horaires d'ouverture</u> :</h1>
          <ul>
            <?php
                // Affiche les créneaux d'ouverture (1 ou +)
                // $k = key
                showCreneaux(JOURS,CRENEAUX);
            ?>
          </ul>
        </div>
      </div>
      <!-- Voir également OPENSTREETMAP une alternative à google map -->
      <iframe class="col-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20942.08403314647!2d1.6917566000000062!3d48.99611494999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6be53577d3c3d%3A0x8ae4cadf5d389a34!2s78200%20Mantes-la-Jolie!5e0!3m2!1sfr!2sfr!4v1668928613111!5m2!1sfr!2sfr" width="500" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</main>


<?php require './components/footer.php' ?>