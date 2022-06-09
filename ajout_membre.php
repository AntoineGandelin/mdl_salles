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
			<h1 class="Titre">Maison des Ligues - Ajouter un membre</h1>
		</header>
		<main>
			<form action="ajout_membre_go.php" method="get">
				<table>
					<tr><td class="droite">Etablissement</td><td><input type="text" name="etab" length="100" required></td></tr>
					<tr><td class="droite">Ville</td><td><input type="text" name="ville" length="100" required></td></tr>
					<tr><td class="droite">Code postal</td><td><input type="text" name="code_postal" length="100" required></td></tr>
					<tr><td class="droite">E-mail</td><td><input type="email" name="mail" length="100" required></td></tr>
					<tr><td class="droite">N° de téléphone</td><td><input type="tel" name="tel" length="100" required></td></tr>
					<tr><td class="droite">Nom d'utilisateur</td><td><input type="text" name="login" length="100" required></td></tr>
					<tr><td class="droite">Mot de passe</td><td><input type="password" name="mdp" required></td></tr>
					<tr><td></td><td><input type="submit" style="cursor: pointer;" value="Enregistrer"></td></tr>
					<tr><td></td><td><input type="reset" style="cursor: pointer;" value="Réinitialiser"></td></tr>
				</table>
			</form>
			<br>
			<button class="btn" style="cursor: pointer;" onclick="window.location.href='index.php'">Retourner à l'accueil</button>
		</main>
	</body>
</html>