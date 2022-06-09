<!DOCTYPE html>
<html>
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<script type="text/javascript" src="affectation_reservation.js"></script>
		<link href="index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<header>
			<h1 class="Titre">Maison des Ligues - Affecter un membre à une réservation</h1>
		</header>
		<main>
			<select onchange="ajax_affect()">
				<option style="text-align: center;" value="">--- Sélectionner une réservation ---</option>
				<?php
					$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
					$chaine_req = 'select * from reservation order by date_debut desc';
					$req = pg_query($chaine_req);
					$ligne = pg_fetch_assoc($req);
					while($ligne) 
						{
						echo '<option style="text-align: center;" value="'.$ligne['id_reservation'].'">';
						echo $ligne['nom'];	
						echo '</option>';
						$ligne = pg_fetch_assoc($req);
						}
					pg_close($conn);
				?>
			</select>
			<br><br>
			<div id="affect">
			
			</div>
			<br>
			<button class="btn" style="cursor: pointer;" onclick="window.location.href='index.php'">Retourner à l'accueil</button>
		</main>
	</body>
</html>