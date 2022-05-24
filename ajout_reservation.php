<!DOCTYPE html>
<html>
	<head>
		<title>Maison des Ligues</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<link href="index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<header>
			<h1 class="Titre">Maison des Ligues - Réserver une salle</h1>
		</header>
		<main>
			<form action="ajout_reservation_go.php" method="get">
				<table>
					<tr><td class="droite">Nom de la salle</td><td><input type="text" name="nom" length="100" required></td></tr>
					<tr class="yellow"><td class="droite">Commentaires</td><td><textarea name="comm" style="width: 352px; height: 100px;"></textarea></td></tr>
					<tr><td class="droite">Ouverture de la salle</td><td><input type="datetime-local" name="ouverture" required></td></tr>
					<tr class="yellow"><td class="droite">Fermeture de la salle</td><td><input type="datetime-local" name="fermeture" required></td></tr>
					<tr><td class="droite">Lieu de la salle</td><td><input type="text" name="lieu" length="150" required></td></tr>
					<tr class="yellow"><td class="droite">Activité exercée</td><td><input type="text" name="activite" length="150" required></td></tr>
					<tr><td class="droite">Horaire de début</td><td><input type="datetime-local" name="deb" length="150" required></td></tr>
					<tr class="yellow"><td class="droite">Horaire de fin</td><td><input type="datetime-local" name="fin" length="150" required></td></tr>
					<tr class="droite"><td></td><td><input type="submit" value="Enregistrer"></td></tr>
					<tr class="droite"><td></td><td><input type="reset" value="Réinitialiser"></td></tr>
				</table>
			</form>
			<br>
			<button class="back" onclick="window.location.href='index.php'">Retourner à l'accueil</button>
		</main>
	</body>
</html>