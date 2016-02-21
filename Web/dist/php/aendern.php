<?php

	function ladeDatenBenutzer($benutzer){
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT FirstName, LastName, Street, Zip, City FROM Customers WHERE Login = '$benutzer'";
		
		$result = mysql_query($sql, $con);
		
		$firstName = mysql_result($result, 0, 'FirstName');		
		$lastName = mysql_result($result, 0, 'LastName');
		$street = mysql_result($result, 0, 'Street');
		$zip = mysql_result($result, 0, 'Zip');
		$city = mysql_result($result, 0, 'City');
		
		$daten = array($firstName, $lastName, $street, $zip, $city);
		
		mysql_close($con);
	
		return $daten;
	}
	
	function aenderungenVerarbeiten($FirstName, $LastName, $Street, $Zip, $City, $inputAltesPasswort, $inputPasswortNeu, $inputPasswortNeuW, $benutzer){
	
	$aenderungen = array();

		if (!empty($FirstName)){
			array_push($aenderungen, "FirstName");
		}
		if (!empty($LastName)){
			array_push($aenderungen, "LastName");
		}
		if (!empty($Street)){
			array_push($aenderungen, "Street");
		}
		if (!empty($Zip)){
			array_push($aenderungen, "Zip");
		}
		if (!empty($City)){
			array_push($aenderungen, "City");
		}
	
	$result = compact("event", "nothing_here", $aenderungen);
		
	foreach($result as $key => $value)
	{
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "UPDATE Customers SET $key = '$value' WHERE Login = '$benutzer'";
				
		$result = mysql_query($sql, $con);	
			
		mysql_close($con);
	}
	
	if (!empty($inputAltesPasswort) AND !empty($inputPasswortNeu) AND !empty($inputPasswortNeuW)){
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Password FROM Customers WHERE Login = '$benutzer'";
			
		$result = mysql_query($sql, $con);
		
		$passwortAenderung = mysql_result($result, 0, 0);
		
		mysql_close($con);
		
		echo $passwortAenderung;
		echo crypt($inputAltesPasswort, $passwortAenderung);
		
		if (crypt($inputAltesPasswort, $passwortAenderung) == $passwortAenderung){
			if ($inputPasswortNeu == $inputPasswortNeuW){
				$salt1 = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
				$passwortUpdate = crypt($inputPasswortNeu, $salt1);
				$con = mysql_connect('localhost','root','');
				mysql_select_db('ebertspizzapalace', $con);
				$sql = "UPDATE Customers SET Password = '$passwortUpdate' WHERE Login = '$benutzer'";
						
				$result = mysql_query($sql, $con);	
					
				mysql_close($con);
				
				session_destroy();
			
				echo '
				<script type="text/javascript">
					window.location.href=\'index.php\';
				</script>
				';
			}
			else{
				echo '
					<div id="fehlerNeuesPasswort" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Fehler neues Passwort</h4>
										</div>
										<div class="modal-body">
											<p>Fehler: Beim neuen Passwort ist ein Fehler aufgetreten.</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
										</div>
									</div>
								</div>
							</div>
					<script>
						$(\'#fehlerNeuesPasswort\').modal( \'show\'); 
					</script>
				';
			}
		}
		else{
			echo '
				<div id="fehlerAltesPasswort" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Fehler altes Passwort</h4>
									</div>
									<div class="modal-body">
										<p>Fehler: Altes Passwort nicht korrekt.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
									</div>
								</div>
							</div>
						</div>
				<script>
					$(\'#fehlerAltesPasswort\').modal( \'show\'); 
				</script>
			';
		}
	}
	}

?>