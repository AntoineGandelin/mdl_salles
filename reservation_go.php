<?php
	// Déterminer les points faibles liés à cette page :
	// erreurs envisageables, possibilités de fraude, failles de sécurité, etc
	// Proposer une correction pour chaque point trouvé
	// =================================================
	// Pour chaque point rencontré, procéder par étapes
	// - description du problème
	// - solution envisagée (textuelle)
	// - solution envisagée (code)
	// Remarque : ne vous lancez dans le code qu'une fois 
	// l'ensemble des points faibles repérés
	// =================================================
	
	
	// 0 - La page attend des paramètres, ils peuvent ne pas être présents	
	// Solution : Tester la présence des paramètres attendus
	
	// 1 - Pas de session - même une personne non identifiée peut accéder à cette page
	// Solution : ajouter session_start()	
	
	// 2 - La connexion apparaît directment dans chaque page, cette répétition
	// peut provoquer des erreurs et des trous de sécurité
	// Solution : on inclut une page de connexion (on en profite pour changer le mot de passe)
	$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');	
	
	// 3 - Le paramètre passé ($_GET) peut contenir des tentatives d'injectin SQL
	// Solution : on peut limiter la taille de la chaîne et s'assurer qu'elle ne contient 
	// pas de caractères interprétables par le moteur de données (; par exemple ou espace) 
	$login = $_GET['log'];

	// 4 - Le paramètre passé ($_GET) peut contenir des tentatives d'injectin SQL
	// Solution : comme un nombre est attendu, on force le type de la variable en entier 
	// 5 - Le login étant passé en paramètre, on peut passer n'importe quel login
	// Solution : utilisez $_SESSION plutôt que $_GET pour obtenir le login
	$login = $_GET['log'];

	// 6 - Le paramètre passé ($_GET) peut contenir des tentatives d'injectin SQL
	// Solution : comme un nombre est attendu, on force le type de la variable en entier 
	$id_reservation = $_GET['id'];

	// 7 - Le paramètre passé ($_GET) peut contenir des tentatives d'injectin SQL
	// Solution : comme un nombre est attendu, on force le type de la variable en entier 
	$choix = $_GET['ch'];

	$chaine_req = "select id_membre from membre where login='".$login."'";

	// 8 - On prévoit que la requête ne peut aboutir 
	// Solution : on teste la valeur de $req
	$req = pg_query($chaine_req);
	$res = pg_fetch_row($req);
	
	// 9 - On vérifie que le résultat est non null
	// Solution : on teste la valeur de $res
	$id_membre = $res[0];
	
	// 10 - On s'assure que le choix est bien possible pour le vote donné
	// Solution : pas d'autre choix que de vérifier dans la base
	// 11 - On s'assure que le choix n'est pas renseigné pour cette participation avant de le modifier
	// Solution : On s'appuie sur une requête dans la base 	
	$chaine_req = 'update participation set id_choix='.$choix.' where id_membre='.$id_membre.' and id_reservation='.$id_reservation;

	// 12 - On prévoit que la requête ne peut aboutir 
	// Solution : on teste la valeur de retour de la fonction
	pg_query($chaine_req);
	pg_close($conn);
	
	// 13 - On peut utiliser la cle pour sécuriser le vote, un attaquant n'ayant pas 
	// la clé ne pourra pas voter
	// Solution : conditionner l'ensemble du traitement à la vérification de la clé.
	header('Location: reservation.php?id='.$id_reservation);
	
	// En modifiant le code, on crée davantage de code qui risque lui-aussi de contenir des failles.	
	
?>	
