<?php
	session_start();
	//require("mysql.php");
	
	function anmelden($inputBenutzer, $inputPassword){
		$benutzerCheck = true;
		
		if (BenutzernameCheck2($inputBenutzer) == 0){
			echo '
			<div id="myModal6" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Einloggen</h4>
								</div>
								<div class="modal-body">
									<p>Fehler: Der Benutzername ist ungültig!</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
								</div>
							</div>
						</div>
					</div>
			<script>
				$(\'#myModal6\').modal( \'show\'); 
			</script>
			';
			$benutzerCheck = false;
		}
		
		if ($benutzerCheck){
			createConnection();
			//$con = mysql_connect('localhost','root','');
			//mysql_select_db('ebertspizzapalace', $con);
			$sql = "SELECT Password, IsDeleted, IsAdmin FROM Customers WHERE Login = '$inputBenutzer'";
				
			$result = mysql_query($sql);
			
			$passwort = mysql_result($result, 0, 0);
			$geloescht = mysql_result($result, 0, 'IsDeleted');
			$isAdmin = mysql_result($result,0,'IsAdmin');
			//mysql_close($con);
			closeConnection();
			
			if (crypt($inputPassword, $passwort) == $passwort AND $geloescht != "1"){
				$_SESSION['username']=$inputBenutzer;
				$_SESSION['isAdmin']=$isAdmin;
				echo '
				<script type="text/javascript">
					window.location.href=\'index.php\';
				</script>
				';
			}
			else{
				echo '
				<div id="myModal6" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Einloggen</h4>
									</div>
									<div class="modal-body">
										<p>Fehler: Einloggen fehlgeschlagen!</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
									</div>
								</div>
							</div>
						</div>
				<script>
					$(\'#myModal6\').modal( \'show\'); 
				</script>
				';
			}
		}
	}
	
	function BenutzernameCheck2($inputBenutzer) {
		createConnection();
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Login FROM Customers WHERE Login = '$inputBenutzer'";
		$result = mysql_query($sql);
			 
		$count = mysql_num_rows($result);
				
		//mysql_close($con);
		closeConnection();
				
		return $count;
	}
?>