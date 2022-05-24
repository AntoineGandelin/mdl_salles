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
			$req = pg_query($chaine_req);
			$ligne = pg_fetch_assoc($req);
			$ouverture = new DateTime($ligne['date_debut']);
			$fermeture = new DateTime($ligne['date_fin']);

			$chaine_req1 = 'select horaire_debut, horaire_fin from choix';
			$req1 = pg_query($chaine_req1);
			$ligne1 = pg_fetch_assoc($req1);
			$horaire_deb = new DateTime($ligne1['horaire_debut']);
			$horaire_fin = new DateTime($ligne1['horaire_fin']);
		?>	
	</head>
	<body>
		<header>
			<h1>Maison des Ligues - Réservations terminées</h1>
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
				Ouverture de la salle : <?php echo $ouverture->format('d/m/Y').' à '.$ouverture->format('H:i') ?>			
			</article>
			<article class="description">
				Fermeture de la salle : <?php echo $fermeture->format('d/m/Y').' à '.$fermeture->format('H:i') ?>			
			</article>
			<article class="description">
				Lieu de la salle : <?php echo $ligne['lieu'] ?>			
			</article>
			<article class="description">
				La réservation a eu lieu le <?php echo $horaire_deb->format('d/m/Y').' à '.$horaire_deb->format('H:i').' et s\'est terminée le '.$horaire_fin->format('d/m/Y').' à '.$horaire_fin->format('H:i') ?>			
			</article>
			<br>
			Consulter les réservations en cours ainsi que les prochaines réservations !	
		</main>
	</body>
</html>
