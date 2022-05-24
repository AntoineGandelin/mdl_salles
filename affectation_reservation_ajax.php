
		<?php
			$conn = pg_connect('host=127.0.0.1 dbname=mdl_salle user=mdl_admin password=admin');
			// valeur numérique	
			$reservation_courante = $_GET['id']*1;	
			$chaine_req = 'select * from reservation where id_reservation = '.$reservation_courante;
			$req = pg_query($chaine_req);
			$ligne = pg_fetch_assoc($req);
			echo 	'<h2>'.$ligne['nom'].'</h2>';
			echo 	$ligne['commentaire'].'<br><br>';
		?>			
		<form action="affectation_reservation_ajax_go.php" method="get">
			<input type="hidden" name="vo" value=
			<?php echo '"'.$reservation_courante.'"'; ?>>
			<table>
				<tr><th width="80%">Nom d'utilisateur</th><th>Réservation</th></tr>
				<?php
				// Récupération les utilisateurs et participation  
				$string_req = 'select m.id_membre, login, id_reservation from membre m inner join participation p on m.id_membre = p.id_membre where id_reservation = ';
				$string_req = $string_req.$reservation_courante.'union select id_membre, login, 0 from membre where id_membre not in ';
				$string_req = $string_req.'(select m.id_membre from membre m inner join participation p on m.id_membre = p.id_membre where id_reservation = ';
				$string_req = $string_req.$reservation_courante.') order by 3 desc, 2 asc';
				$req = pg_query($string_req);
				$tab = pg_fetch_assoc($req);
				$pair=0;
				while($tab) 
					{
					echo '<tr ';
					if($pair++%2) 
						{
						echo 'class="yellow" ';
						}
					echo '>';
					echo '<td>'.$tab['login'].'</td><td><input type="checkbox" name="ok[]" value="'.$tab['id_membre'].'" ';
					if($tab['id_reservation'] != 0) 
						{
						echo 'checked';				
						}
					echo '></td><tr>';
					$tab = pg_fetch_assoc($req);
					}
				pg_close($conn);
				?>
				<tr><td><input type="submit" value="Enregistrer"></td><td></td></tr>
			</table>
		</form>	


