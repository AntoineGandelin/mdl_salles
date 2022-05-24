<?php
	$etablissement = $_GET['etab'];
	$ville = $_GET['ville'];
	$code_postal = $_GET['code_postal'];
	$email = $_GET['mail'];
	$tel = $_GET['tel'];
	$login = substr($_GET['login'], 0, 10);
	$pass = md5($_GET['mdp']);
	
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


