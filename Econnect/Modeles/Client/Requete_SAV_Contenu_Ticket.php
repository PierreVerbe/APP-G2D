<?php
	try{
		include ("../../Modeles/Requete_parametre.php");
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	if (isset($_POST['postid'])){
		$id_ticket = $_POST['postid'];

		##### Pièces ######

		$req = $bdd->query('SELECT message.ID_Message, message.Date_message, message.Piece_jointe, message.Contenu FROM message, ticket WHERE message.ID_Ticket = ticket.ID_Ticket AND ticket.ID_Ticket =  "'.$id_ticket.'"');

		?>
		<h2>Contenu du ticket</h2>
		<?php

		while ($donnees = $req->fetch()){
			echo '<p>Message n°'. $donnees['ID_Message'] . '</p>';
			echo '<p>Date :'. $donnees['Date_message'] . '</p>';
			echo '<p>Pièce jointe :'. $donnees['Piece_jointe'] . '</p>';
			echo '<label>Contenu :</label><p id="contenu_message">'. $donnees['Contenu'] . '</p>';
			echo "<p><hr width=90%></p>";
		}

		?>

		<form method="post" action="../../Modeles/Client/Requete_SAV_Ajout_Message_Ticket.php">	
			   	<p>
			       <label for="message">Message :</label><br />
			       <textarea class="zone_message_SAV" name="message" id="message" rows="7" ></textarea>
			   	</p>
			   	<input type="hidden" id="num_ticket" name="id_ticket" value="" />
			   	<input class="bouton_envoyer" type="submit" value="Répondre"/>
		</form>

		<?php


	}

	$req->closeCursor();
?>