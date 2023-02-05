## Tchat, Application de messagerie
  
Il s'agit d'une application qui permet d'envoyer et partager des messages entre les utilisateurs.
Ce projet a pour but de me familiariser avec le langage PHP.
  
**Environnement de développement** :
``WAMP, Visual Code Studio``
  
**Technologies utilisées** :
``HTML / CSS / Javascript / PHP / Bootstrap``
  
### INSTALLATION ET EXECUTION DE L'APPLICATION
  
Cloner ce dépôt et suivre une des 2 méthodes ci-dessous.  
  
__Méthode 1__ : Installer PHP sur https://www.php.net/downloads.php. Pour Windows il s'agit de la version VS16 x64 Non Thread Safe (à ce jour). Ensuite aller dans les paramètres avancés du système -> variable d'environnement, ajouter le chemin de l'executable PHP (exemple: C:\Program Files\PHP).
Pour savoir si php est bien installé, ouvrir l'invité de commande ou terminal, puis entrer la commande ``php -v``.  
Pour lancer l'application, ouvrir un terminal à la racine du dépôt et lancer la commande ``php -S localhost:9000``, l'application sera disponible sur ``http://localhost:9000``

__Méthode 2__ : Installer Wamp pour Windows https://www.wampserver.com/. Aller dans C:\wamp64, puis créer un dossier 'www' s'il n'est pas déjà crée. Mettre ce dépôt dans le dossier 'www'.  
Lancer le serveur Wamp. L'application' sera accessible sur ``http://localhost`` ou ``http://127.0.0.1/``

### FONCTIONNALITES DE L'APPLICATION
~ Poster un message qui sera sauvegardé  
~ Système de création de compte utilisateur et d'authentification (avec formulaire connexion et inscription)  
~ Tableau de bord administrateur (accessible seulement par le compte Admin) qui affiche la liste des utilisateurs inscris et le nombre de visites

### BASE DE DONNEES
Les données sont sauvegardées dans des fichiers, accessibles dans le dossier 'datas'.
Il y a 3 types de données : Users, Messages, et View.  
~ Le fichier `users` regroupe les utilisateurs inscris.  
~ Le fichier `message` regroupe les messages envoyés.  
~ Le dossier `views` regroupe les nombres de visites, chaque fichier correspond à un jour.

### TYPES D'UTILISATEUR
Il existe 3 types d'utilisateur de l'application :  
~ __Visiteur__ : l'utilisateur qui n'a pas de compte, il peut envoyer un message sous le pseudo de 'inconnu'.  
~ __Membre__ : l'utilisateur qui possède un compte, il peut envoyer un message et accéder à son profil.  
~ __Administrateur__ : l'administrateur du site, il a les mêmes capacités que le membre. En plus de ça, il est le seul à avoir accès au tableau de bord pour administrer le site.

### COMPTE ADMINISTRATEUR
Voici les identifiants du compte administrateur :  
~ pseudo : `Admin`  
~ mot de passe : `ADMIN8JD0F`


### RENDU VISUEL

#### Page d'accueil (vue visiteur)
<img src="https://i.ibb.co/gyC7279/home-1.jpg" width="90%px">

#### Page d'accueil (vue membre)
<img src="https://i.ibb.co/GQV1VfT/home-2.jpg" width="90%px">

#### Page d'accueil (vue administrateur)
<img src="https://i.ibb.co/wMkH1Nc/home-3.jpg" width="90%px">

#### Page de profil
<img src="https://i.ibb.co/f1PJm7B/profile.jpg" width="90%px">

#### Page de connexion
<img src="https://i.ibb.co/Sm7FJ41/login.jpg" width="90%px">

#### Page d'inscription
<img src="https://i.ibb.co/qYdYTKf/signup.jpg" width="90%px">

#### Tableau de bord administrateur
<img src="https://i.ibb.co/LJVXp5V/dashboard.jpg" width="90%px">