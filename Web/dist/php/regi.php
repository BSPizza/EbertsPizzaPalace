<?php
	function registrieren($inputVorname, $inputNachname, $inputStrasse, $inputPLZ, $inputOrt, $inputBenutzername, $inputPasswortRegi, $inputPasswortRegiW){
		
	$passwortCheck = true;
	$benutzerCheck = true;
	
	if (!($inputPasswortRegi == $inputPasswortRegiW)){
		echo '
			<div id="myModal3" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Registrieren</h4>
								</div>
								<div class="modal-body">
									<p>Fehler: Die Passwörter stimmen nicht überein</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
								</div>
							</div>
						</div>
					</div>
			<script>
				$(\'#myModal3\').modal( \'show\'); 
			</script>
		';
		$passwortCheck = false;
	}

	if (BenutzernameCheck($inputBenutzername) != 0){
		echo '
			<div id="myModal4" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Registrieren</h4>
								</div>
								<div class="modal-body">
									<p>Fehler: Der Benutzername ist bereits vorhanden, bitte wählen sie einen anderen</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
								</div>
							</div>
						</div>
					</div>
			<script>
				$(\'#myModal4\').modal( \'show\'); 
			</script>
		';
		$benutzerCheck = false;
	}
	
	if ($passwortCheck and $benutzerCheck){
		$salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
		$passwort = crypt($inputPasswortRegi, $salt);
		
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		$sql = "INSERT INTO Customers (FirstName, Lastname, Street, Zip, City, Login, Password) VALUES ('$inputVorname', '$inputNachname', '$inputStrasse', '$inputPLZ', '$inputOrt', '$inputBenutzername', '$passwort')";
		
		$result = mysql_query($sql);
		
		//mysql_close($con);
		closeConnection();
		
		echo '
			<div id="myModal5" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Registrieren</h4>
								</div>
								<div class="modal-body">
									<p>Erfolgreich registriert!</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
								</div>
							</div>
						</div>
					</div>
			<script>
				$(\'#myModal5\').modal( \'show\'); 
			</script>
		';
		
	}
		
	}
	
	function BenutzernameCheck($inputBenutzername) {
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Login FROM Customers WHERE Login = '$inputBenutzername'";
		$result = mysql_query($sql, $con);
	 
		$count = mysql_num_rows($result);
		
		mysql_close($con);
		
		return $count;
	}
?>