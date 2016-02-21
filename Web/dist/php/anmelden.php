<?php
	
	function anmelden($inputBenutzer, $inputPassword){
			
/*		
			if (!($inputPasswortRegi == $inputPasswortRegiW)){
				echo '
				<p align="center"> Die Passwörter stimmen nicht überein</p>
				';
				$passwortCheck = false;
			}
*/
			if (BenutzernameCheck($inputBenutzer) == 0){
				echo '
				<p align="center"> Der Benutzername ist ungültig</p>
				';
				//$benutzerCheck = false;
			}
			
			/*
			if ($passwortCheck and $benutzerCheck){
				$salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
				$passwort = crypt($inputPasswortRegi, $salt);
				
				$con = mysql_connect('localhost','root','');
				mysql_select_db('ebertspizzapalace', $con);
				$sql = "INSERT INTO Customers (FirstName, Lastname, Street, Zip, City, Login, Password) VALUES ('$inputVorname', '$inputNachname', '$inputStrasse', '$inputPLZ', '$inputOrt', '$inputBenutzername', '$passwort')";
				
				$result = mysql_query($sql, $con);
				
				mysql_close($con);
				
				echo '
				<p align="center">Erfolgreich registriert!</p>
				';
				
			}
				echo '
				<br><br><br>
				';
		*/
		
		
		
	}
	
	function BenutzernameCheck($inputBenutzername)
	{
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Login FROM Customers WHERE Login = '$inputBenutzername'";
		$result = mysql_query($sql, $con);
			 
		$count = mysql_num_rows($result);
				
		mysql_close($con);
				
		return $count;
	}
?>