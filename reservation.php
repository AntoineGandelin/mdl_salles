<?php
	// Démarrage d'une nouvelle session ou reprise d'une session existante avec la fonction session_start()
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="reservation.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="reservation.js"></script>
		<?php 			
			$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');
			// S'assurer que l'identifiant est forcément un entier avec int	
			$id = (int)$_GET['id'];
			$chaine_req = 'select * from reservation where id_reservation='.$id;
			$req1 = pg_query($chaine_req);
			$ligne = pg_fetch_assoc($req1);
			// Utilisation de la classe DateTime pour récuper les dates
			$d_deb = new DateTime($ligne['date_debut']);
			$d_fin = new DateTime($ligne['date_fin']);
			$d_cr = new DateTime($ligne['date_creation']);
			$chaine_req = 'select * from choix where id_reservation='.$id;
			$req2 = pg_query($chaine_req);
			$tab = pg_fetch_all($req2);
			// Utilisation de la classe DateTime pour récuper les dates
			$horaire_deb = new DateTime($tab[0]['horaire_debut']);
			$horaire_fin = new DateTime($tab[0]['horaire_fin']);
			// Utilisation de la fonction isset pour déterminer si une variable est déclarée et est différente de null (0)
			// Ici, on souhaite savoir si la variable $SESSION_['login'] est bien déclarée
			$disabled = isset($_SESSION['login'])?'':'disabled';
			if(isset($_SESSION['login']))
				{
				// Utilisation de la fonction pg_escape_literal afin de protèger une requête SQL littérale à insérer dans un champ texte	
				$chaine_req = 'select * from participation p left join choix using(id_choix) where id_membre = (select id_membre from membre where login = '.pg_escape_literal($_SESSION['login']).') and p.id_reservation = '.$id;
				$req3 = pg_query($chaine_req);
				$ligne2 = pg_fetch_assoc($req3);
				if(!$ligne2)
					{
					$disabled = 'disabled';
					}
				else
					{
					if($ligne2['id_choix'])
						{
						$disabled = 'disabled';		
						}						
					}
				}			
			pg_close($conn);
		?>	
	</head>
	<body>
		<header>
			<h1>Maison des Ligues - Réservations en cours</h1>
		</header>
		<main>
			<br>
			<article class="titre">
				<input name="reservation" type="hidden" value="<?php echo $id; ?>" />
				<input name="membre" type="hidden" value="<?php echo $_SESSION['login']; ?>" />
				Nom de la salle : <?php echo $ligne['nom'] ?>  
			</article>
			<article class="description">
				Commentaire : <?php echo $ligne['commentaire'] ?>			
			</article>
			<article class="description">
				<!-- Retourne une date formatée suivant le format fourni avec DateTime::format -->
				<!-- d/m/Y pour la date en français et H:i pour l'heure -->
				Ouverture de la salle depuis le <?php echo $d_deb->format('d/m/Y').' à '.$d_deb->format('H:i') ?>			
			</article>
			<article class="description">
				<!-- Retourne une date formatée suivant le format fourni avec DateTime::format -->
				<!-- d/m/Y pour la date en français et H:i pour l'heure -->
				Fermeture de la salle le <?php echo $d_fin->format('d/m/Y').' à '.$d_fin->format('H:i') ?>			
			</article>
			<article class="description">
				Lieu de la salle : <?php echo $ligne['lieu'] ?>			
			</article>
			<?php
				echo '<article class="choix">';
				foreach ($tab as $choix)
					{
					echo '<div style="text-align:center">Horaire disponible : </div><br>';
					echo '<input type="radio" value="'.$choix['id_choix'].'" name="choix" '.$disabled.'>';
					// Retourne une date formatée suivant le format fourni avec DateTime::format
					// d/m/Y pour la date en français et H:i pour l'heure 
					echo 'De '.$horaire_deb->format('H:i').' à '.$horaire_fin->format('H:i');				
					}			
				echo '</article><br>';
				
				// Utilisation de la fonction isset pour déterminer si une variable est déclarée et est différente de null (0)
				// Ici, on souhaite savoir si la variable $SESSION_['login'] est bien déclarée
				if(isset($_SESSION['login']))
					{
					if(!$ligne2) 
						{
						echo '<br>Vous n\'êtes pas autorisé à réserver cette salle';
						}
					else 
						{
						if($ligne2['id_choix'])
							{
							echo '<br>Vous avez déjà réservé cette salle';
							}					
						else 
							{
							echo 'Saisir votre clé d\'identification <input type="text" name="cle"> et <button onclick="reserver()">réserver cette salle</button>';
							}
						}					
					}
				else 
					{
					echo 'Pour réserver une salle, veuillez vous identifier : <button onclick="connect()">Connexion</button>'; 
					}
			?>

			<div id="connect">			
				<br>
				<!-- Création d'un formulaire de connexion pour réserver une salle -->
				<form method="get" action="connect_go.php">
					<article class="description">
						Login : <input type="text" name="login">  
					</article>
					<article class="description">
						Mot de passe : <input type="password" name="mdp">			
					</article>
					<input type="submit" value="Se connecter">
					<input type="hidden" name= "id" value="<?php echo $id ?>" />
				</form>
			</div>
		</main>
	</body>
</html>

