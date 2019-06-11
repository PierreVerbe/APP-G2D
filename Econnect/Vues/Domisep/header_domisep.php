<?php session_start();
  if(isset($_SESSION['type']) or !isset($_SESSION['id'])){
    if($_SESSION['type'] != "Domisep" or !isset($_SESSION['id'])) {
      session_destroy();
      header("Location: ../../index.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
        <link rel="stylesheet" href="style_domisep.css" />
        <title>Econnect</title>
</head>

<header>
		
	<!-- Image logo -->
  <div id = "image_fond_header">
  <div id = "logo_fond">
    <img src="../Image/Econnect_feuille_mini.png" alt="Logo_Econnect" />
  </div>
  </div>
	

</header>
	<!-- Menu -->
	<ul class="navbar">
  		<li><a href="accueil_domisep.php">Accueil</a></li>
  		<li><a href="liste_clients_domisep.php">Liste Clients</a></li>
  		<li><a href="profil_domisep.php">Mon profil <?php if(isset($_SESSION['id'])) echo "(".$_SESSION['id'].")";?></a></li>
  		<li><a href="quit_domisep.php">Déconnexion</a>
  		</li>
	</ul>

<script src="javascript/suiviNav.js" ></script>