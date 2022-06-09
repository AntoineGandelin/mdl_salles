<?php
	// Paramètres passés avec la méthode GET
	$etablissement = $_GET['etab'];
	$ville = $_GET['ville'];
	$code_postal = $_GET['code_postal'];
	$email = $_GET['mail'];
	$tel = $_GET['tel'];
	// Utilisation de la fonction substr() afin que cela retourne un segment de chaîne du login (ici en partant de 0 et ayant une longueur de 10 caractères)
	$login = substr($_GET['login'], 0, 10);
	// Utilisation de la fonction de hachage md5() afin de ne faire circuler que l'empreinte du mot de passe en clair 
	$pass = md5($_GET['mdp']);
	
	// Pour des mesures de sécurité, on peut également créer une autre page de connexion (en créant un nouvel utilisateur possédant uniquement les 
	// droits de lecture et en changeant le mot de passe également)
	$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');
	$chaine_req = 'insert into membre (etablissement, ville, code_postal, email, tel, login, mdp) values ('."'".$etablissement."', '".$ville."', '".$code_postal."', '".$email."', '".$tel."', '".$login."', '".$pass."')";
	$req = pg_query($chaine_req);
	pg_close($conn);
	if($req)
		{
		echo 'Félicitations, l\'enregistrement du membre a bien été effectué !';
		}
	else 
		{
		echo 'Erreur, l\'enregistrement du membre à échoué !';
		}
	echo '<br /><a href="ajout_membre.php">Revenir à la page d\'ajout d\'un membre</a>';
	echo '<br /><a href="index.php">Revenir à la page d\'accueil</a>';
?>


