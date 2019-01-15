<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style_admin.css">
		<title>Chat/SAV</title>
	</head>

	<body>

		<?php include ("header_admin.php")?>

			<section class="bloc_SAV">

				<h1>Chat/SAV</h1>
		
				<!-- deuxième block du tableau de bord = haut droit -->
				<article class="Liste_tickets">
					<h2>Liste de vos tickets :</h2>
			
					<?php include ("../../Controleurs/bdd_liste-tickets-sav_admin.php");?>	
				</article>
				<br />

				<script src="http://code.jquery.com/jquery.min.js"></script>

				<script>

					var table = document.getElementById('SAV_table');

					for(var i = 1; i < table.rows.length; i++)
					{
						table.rows[i].onclick = function()
						{
							var id_ticket = this.cells[2].innerHTML;

							document.getElementById('num_ticket').value = id_ticket;

							$.post("../../Controleurs/bdd_message-tickets-sav_admin.php", {postid: id_ticket},
								function(data){
									$('#contenu_ticket').html(data);
								});
						}
					}

					function closeTicket(){
						id_ticket = document.getElementById('num_ticket').value;

						if (id_ticket == 0)
						{
							alert("Pas de ticket sélectionné");
							return 0;
						}

						$.post("../../Controleurs/bdd_fermeture-ticket-admin.php", {numticket: id_ticket},
								function(data){
									alert("Le ticket a bien été fermé");
									javascript:document.location.href='http://localhost/Econnect/A1-Econnect/Econnect/Vues/Administrateur/chat_sav.php';
									id_ticket = 0;
								});
					}

				</script>

				<!-- message client -->
				<h2>Contenu du ticket :</h2>

				<!-- Pour la barre de délimitation -->
				<div id="contenu_ticket"></div>

				<h2>Répondre à un ticket :</h2>

				<div class="SAV_nouveau_ticket">
					<form method="post" action="../../Controleurs/bdd_traitement-ticket_admin.php">
			    		<p>
				       		<label for="message">Message :</label><br />
				       		<textarea class="zone_message_SAV" name="message" id="message" rows="7" ></textarea>
				   		</p>

				   		<input type="hidden" id="num_ticket" name="id_ticket" value="" />

				   		<p>
				   			<input class="bouton_envoyer" type="submit" value="Envoyer"/>
						</p>
					</form>

					<input type="button" name="close_ticket" value="Fermer le ticket" onclick="closeTicket()">
				</div>

				<script type="text/javascript">
					

				</script>

			</section>

		<?php include("footer_admin.php")?>

	</body>
</html>