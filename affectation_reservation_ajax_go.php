<?php
	function generer_cle() 
		{
		$chaine = '!!@@##**2233445566778899aaaaaaaabbccddeeeeeeeeefghiiiiijkmmnnooooooppqrrrrsssttwxyzAAAAAAAABBCCDDEEEEEEEEEFGHJKLMMNNPPQRRRRSSSTTWXYZ';
		//echo strlen($chaine);
		$cle=$chaine[rand(0,132)].$chaine[rand(0,132)].$chaine[rand(0,132)].$chaine[rand(0,132)].$chaine[rand(0,132)].$chaine[rand(0,132)];
		return $cle;
		}
	$num_reservation = $_GET['vo']*1; 	
	$tab_aff = $_GET['ok'];
	$cle = generer_cle();
	$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
	pg_query('begin');	
	$chaine_req = 'delete from participation where id_reservation = '.$num_reservation; 
	pg_query($chaine_req);
	$chaine_req = 'insert into participation(id_reservation, id_membre, cle) values ';
	foreach ($tab_aff as $aff)
		{
		$chaine_req = 	$chaine_req.'('.$num_reservation.', '.$aff.", '".$cle."'),";  		
		}	
	$chaine_req = substr($chaine_req, 0, strlen($chaine_req)-1);
	pg_query($chaine_req);
	$req = pg_query('commit');
	pg_close($conn);
	if($req)
		{
		echo 'Félicitations, la réservation a bien été affectée !';
		}
	else 
		{
		echo 'Erreur, la réservation n\'a pas été affectée !';
		}
	echo '<br /><a href="affectation_reservation.php">Revenir à la page d\'affectation des membres</a>';
	echo '<br /><a href="accueil.php">Revenir à la page d\'accueil</a>';
?>

