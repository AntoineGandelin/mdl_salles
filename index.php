<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="index.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="accueil.js"></script>
	</head>
	<body>
		<header>
			<h1>Maison des Ligues - Réserver une salle</h1>
		</header>
		<main>
			<br>
			En vert, les réservations sont en cours <br> En rouge, les réservations sont terminées <br> En bleu, les réservations sont à venir 
			<?php
				$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
				$chaine_req = "select id_reservation, nom, date_debut, date_fin, lieu, activite from reservation order by 3";
				$req = pg_query($chaine_req);
				$ligne = pg_fetch_assoc($req);
				$d_jour = new DateTime('now');
				while($ligne) 
					{
					// Utilisation de la classe DateTime pour récupérer la date
					$d_deb = new DateTime($ligne['date_debut']);
					$d_fin = new DateTime($ligne['date_fin']);
					// Opérateur ternaire
					$class = $d_fin<$d_jour?'fini':($d_deb>$d_jour?'prevu':'encours');
					$page = $d_fin<$d_jour?'resultat':($d_deb>$d_jour?'consult':'reservation');
					echo '<article style="cursor: pointer;" class="'.$class.'" onclick=ouvrir("'.$page.'.php?id='.$ligne['id_reservation'].'") >'.$ligne['nom'];
					echo '<br /><span class="small">Ouverture de la salle : '.$d_deb->format('d/m/Y').' à '.$d_deb->format('H:i').' <br/>';
					echo 'Fermeture de la salle : '.$d_fin->format('d/m/Y').' à '.$d_fin->format('H:i').' <br/>';
					echo 'Lieu : '.$ligne['lieu'].'<br/>';
					echo 'Activité exercée : '.$ligne['activite'].'</article>';
					$ligne = pg_fetch_assoc($req);
					}
				pg_close($conn);
			?>		
		</main>
	</body>
</html>