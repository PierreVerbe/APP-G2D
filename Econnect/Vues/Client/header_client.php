<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
        <link rel="stylesheet" href="style_client.css" />
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
  		<li><a href="accueil_client.php">Ma maison</a></li>
  		<li><a href="consommation_client.php">Consommation</a></li>
  		<li><a href="SAV_client.php">Chat/SAV</a></li>
  		<li><a href="parametre_client.php">Paramètres</a></li>
  		<li><a href="profil_client.php">Mon profil</a></li>
  		<li><a href="quit_client.php">Déconnexion</a>
  		</li>
	</ul>

<script>
var url = location.href.split("/"); //replace string with location.href
var navLinks = document.getElementsByClassName("navbar")[0].getElementsByTagName("a");
//naturally you could use something other than the <nav> element
var i=0;
var currentPage = url[url.length - 1];
for(i;i<navLinks.length;i++){
 	var lb = navLinks[i].href.split("/");
 	if(lb[lb.length-1] == currentPage) {
 	navLinks[i].className = "current";
	}
}
</script>