<?php
	// Démarrage d'une nouvelle session ou reprise d'une session existante avec la fonction session_start()
	session_start();
	$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');
	// Utilisation de la fonction pg_escape_literal afin de protèger une requête SQL littérale à insérer dans un champ texte	
	$login = pg_escape_literal($conn, $_GET['login']);
	// Utilisation de la fonction de hachage md5() afin de ne faire circuler que l'empreinte du mot de passe en clair 
	$pass = pg_escape_literal(md5($_GET['mdp']));
	$chaine_req = 'select count(id_membre) from membre where login='.$login.' and mdp='.$pass;
	$req = pg_query($chaine_req);
	// S'assurer que $res est forcément un entier avec int et non null
	$res = (int)pg_fetch_row($req)[0]; 
	pg_close($conn);
		
	if($res)
		{
		$_SESSION['login'] = $_GET['login'];
		echo 'Bienvenue '.$_SESSION['login'].'. Vous pouvez maintenant réserver la ou les salles qui vous sont attribuées';
		echo '<br /><a href="reservation.php?id='.$_GET['id'].'">Revenir à la page de réservation</a>';
		}
	else 
		{
		echo 'Vous n\'êtes pas autorisé à réserver cette salle';
		echo '<br />';
		echo '<button onclick="window.close()">Fermer cette page</button> ';
		}
	?>	
