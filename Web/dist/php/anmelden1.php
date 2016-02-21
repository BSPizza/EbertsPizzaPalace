<?php
session_start();
	
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
			$con = mysql_connect('localhost','root','');
			mysql_select_db('ebertspizzapalace', $con);
			$sql = "SELECT Password, IsDeleted FROM Customers WHERE Login = '$inputBenutzer'";
				
			$result = mysql_query($sql, $con);
			
			$passwort = mysql_result($result, 0, 0);
			$geloescht = mysql_result($result, 0, 'IsDeleted');
			
			mysql_close($con);
			
			if (crypt($inputPassword, $passwort) == $passwort AND $geloescht != "1"){
				$_SESSION['username']=$inputBenutzer;
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
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Login FROM Customers WHERE Login = '$inputBenutzer'";
		$result = mysql_query($sql, $con);
			 
		$count = mysql_num_rows($result);
				
		mysql_close($con);
				
		return $count;
	}
?>