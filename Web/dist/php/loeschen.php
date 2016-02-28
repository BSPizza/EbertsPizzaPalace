<?php

	function loeschen($benutzer, $passwort){
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		
		$sql = "SELECT Password FROM Customers WHERE Login = '$benutzer'";
			
		$result = mysql_query($sql);
		
		$passwortDB = mysql_result($result, 0, 0);		
		
		//mysql_close($con);
		closeConnection();
		
		if (crypt($passwort, $passwortDB) == $passwortDB){
			$con = mysql_connect('localhost','root','');
			mysql_select_db('ebertspizzapalace', $con);
			$sql = "UPDATE Customers SET IsDeleted = '1' WHERE Login = '$benutzer'";
				
			$result = mysql_query($sql);	
			
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
			<div id="myModal2" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Account '.$benutzer.' l&ouml;schen</h4>
								</div>
								<div class="modal-body">
									<p>L&ouml;schen des Accounts: '.$benutzer.' nicht m&ouml;glich.</p>
									<p>Fehler: Falsches Passwort</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
								</div>
							</div>
						</div>
					</div>
			<script>
				$(\'#myModal2\').modal( \'show\'); 
			</script>
			';
			
	
			
		}
	}
?>