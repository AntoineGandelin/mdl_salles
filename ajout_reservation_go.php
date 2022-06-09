<?php
	$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
	$chaine_req = 'select max(id_reservation) from reservation';

	$req = pg_query($chaine_req);
	$tab = pg_fetch_row($req);

	if($tab[0])
		{
		$id_reservation = $tab[0]+1;	
		}
	else 
		{
		$id_reservation = 1;
		}

	$chaine_req = 'select max(id_choix) from choix';

	// On prévoit que la requête ne peut aboutir 
	// Solution : on teste la valeur de $req 
	$req = pg_query($chaine_req);
	$tab = pg_fetch_row($req);

	if($tab[0])
		{
		$id_choix = $tab[0]+1;	
		}
	else 
		{
		$id_choix = 1;
		}

	// Changement de la date en français avec la classe DateTime
	$objet_date = new DateTime();
	// Utilisation de la fonction pg_escape_literal afin de protèger une requête SQL littérale à insérer dans un champ texte
	// Retourne une date formatée suivant le format fourni avec DateTime::format
	$date_creation = pg_escape_literal($objet_date->format('d/m/Y'));

	// Paramètres passés avec la méthode GET
	// Utilisation de la fonction pg_escape_literal afin de protèger une requête SQL littérale à insérer dans un champ texte
	$nom_salle = pg_escape_literal($_GET['nom']);
	$commentaire = pg_escape_literal($_GET['comm']);
	$ouverture = pg_escape_literal($_GET['ouverture']);
	$fermeture = pg_escape_literal($_GET['fermeture']);
	$lieu = pg_escape_literal($_GET['lieu']);
	$activite = pg_escape_literal($_GET['activite']);

	pg_query('begin');
	$chaine_req = 'insert into reservation( id_reservation, nom, commentaire, date_creation, date_debut, date_fin, lieu, activite) values (';
	$chaine_req = $chaine_req.$id_reservation.', '.$nom_salle.', ';
	$chaine_req = $chaine_req.$commentaire.', '.$date_creation.', ';
	$chaine_req = $chaine_req.$ouverture.', '.$fermeture.', ';
	$chaine_req = $chaine_req.$lieu.', '.$activite.')';
	pg_query($chaine_req); 
	
	// Utilisation de la fonction pg_escape_literal afin de protèger une requête SQL littérale à insérer dans un champ texte
	$horaire_debut = pg_escape_literal($_GET['deb']);
	$horaire_fin = pg_escape_literal($_GET['fin']);
	$chaine_req = 'insert into choix( id_choix, id_reservation, horaire_debut, horaire_fin) values ';
	$chaine_req = $chaine_req.'('.$id_choix++.', '.$id_reservation;
	$chaine_req = $chaine_req.', '.$horaire_debut.', '.$horaire_fin.')';
	pg_query($chaine_req); 

	$req = pg_query('commit');

	if($req)
		{
		echo 'Félicitations, la réservation a bien été enregistrée !';
		}
	else 
		{
		echo 'Erreur, la réservation n\'a pas été enregistrée !';
		}

	echo '<br /><a href="ajout_reservation.php">Revenir à la page d\'ajout d\'une réservation de salle</a>';
	echo '<br /><a href="index.php">Revenir à la page d\'accueil</a>';

	pg_close($conn);
?>
