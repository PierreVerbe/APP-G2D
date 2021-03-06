<?php

	try{
		include ("../../Modeles/Requete_parametre.php");
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	// Récupération du nom et prenom de l'utilisateur
	$req = $bdd->prepare("SELECT utilisateur.Nom, utilisateur.Prenom FROM utilisateur WHERE utilisateur.ID_User = ?");
	$req->bindParam(1, $_SESSION['id']);
	$req->execute();
			  	
	while ($donnees = $req->fetch()){
		$Nom = $donnees['Nom'];
		$Prenom = $donnees['Prenom'];
		}

	//Récupération du mode de la maison
	$req = $bdd->prepare("SELECT maison.Mode_maison FROM utilisateur, maison, user_maison WHERE user_maison.ID_User = utilisateur.ID_User AND user_maison.ID_Maison = maison.ID_Maison AND utilisateur.ID_User = ? ORDER BY maison.ID_Maison ASC LIMIT 1");
	$req->bindParam(1, $_SESSION['id']);
	$req->execute();
			  	
	while ($donnees = $req->fetch()){
		$Mode = $donnees['Mode_maison'];
		}
?>
		<p class="Text_Slide_h">Bonjour Mr. <?php echo $Prenom ?> <?php echo $Nom ?><br />Vous êtes actuellement en mode "<?php echo $Mode ?>"<br /></p>
<?php
		$req->closeCursor();
?>