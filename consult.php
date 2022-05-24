<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="resultat.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="accueil.js"></script>
		<?php 			
			$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
			$id = (int)$_GET['id'];
			$chaine_req = 'select * from reservation where id_reservation='.$id;
			$req1 = pg_query($chaine_req);
			$ligne = pg_fetch_assoc($req1);
			$d_deb = new DateTime($ligne['date_debut']);
			$d_fin = new DateTime($ligne['date_fin']);
			$d_cr = new DateTime($ligne['date_creation']);
			pg_close($conn);
		?>	
	</head>
	<body>
		<header>
			<h1>Maison des Ligues - Réservation à venir</h1>
		</header>
		<main>
			<br>
			<article class="titre">
				Nom de la salle : <?php echo $ligne['nom'] ?>  
			</article>
			<article class="description">
				Commentaires : <?php echo $ligne['commentaire'] ?>			
			</article>
			<article class="description">
				Date de création : <?php echo $d_cr->format('d/m/Y') ?>			
			</article>
			<article class="description">
				Ouvert à partir du : <?php echo $d_deb->format('d/m/Y').' à '.$d_deb->format('H:i') ?>		
			</article>
			<article class="description">
				Fermé le : <?php echo $d_fin->format('d/m/Y').' à '.$d_fin->format('H:i') ?>		
			</article>
			<article class="description">
				Lieu de la réservation : <?php echo $ligne['lieu'] ?>			
			</article>
			<br>
			Restez à l'affût concernant les prochaines réservations !
		</main>
	</body>
</html>
