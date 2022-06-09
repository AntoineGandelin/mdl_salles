<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="resultat.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="accueil.js"></script>
		<?php 			
			$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');
			// S'assurer que l'identifiant est forcément un entier avec int	
			$id = (int)$_GET['id'];
			$chaine_req = 'select * from reservation where id_reservation='.$id;
			$req = pg_query($chaine_req);
			$ligne = pg_fetch_assoc($req);
			// Utilisation de la classe DateTime pour récuper les dates
			$ouverture = new DateTime($ligne['date_debut']);
			$fermeture = new DateTime($ligne['date_fin']);

			$chaine_req1 = 'select horaire_debut, horaire_fin from choix where id_reservation='.$id;
			$req1 = pg_query($chaine_req1);
			$ligne1 = pg_fetch_assoc($req1);
			// Utilisation de la classe DateTime pour récuper les dates
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
			<article class="nom">
				Nom de la salle : <?php echo $ligne['nom'] ?>  
			</article>
			<article class="commentaire">
				Commentaires : <?php echo $ligne['commentaire'] ?>			
			</article>
			<article class="commentaire">
				<!-- Retourne une date formatée suivant le format fourni avec DateTime::format -->
				<!-- d/m/Y pour la date en français et H:i pour l'heure -->
				Ouverture de la salle : <?php echo $ouverture->format('d/m/Y').' à '.$ouverture->format('H:i') ?>			
			</article>
			<article class="commentaire">
				<!-- Retourne une date formatée suivant le format fourni avec DateTime::format -->
				<!-- d/m/Y pour la date en français et H:i pour l'heure -->
				Fermeture de la salle : <?php echo $fermeture->format('d/m/Y').' à '.$fermeture->format('H:i') ?>			
			</article>
			<article class="commentaire">
				Lieu de la salle : <?php echo $ligne['lieu'] ?>			
			</article>
			<article class="commentaire">
				Activité exercée : <?php echo $ligne['activite'] ?>			
			</article>
			<article class="choix">
				<!-- Retourne une date formatée suivant le format fourni avec DateTime::format -->
				<!-- d/m/Y pour la date en français et H:i pour l'heure -->
				La réservation a eu lieu le <?php echo $horaire_deb->format('d/m/Y').' à '.$horaire_deb->format('H:i').' et s\'est terminée le '.$horaire_fin->format('d/m/Y').' à '.$horaire_fin->format('H:i') ?>			
			</article>
			<br>
			Consulter les réservations en cours ainsi que les prochaines réservations !	
		</main>
	</body>
</html>
