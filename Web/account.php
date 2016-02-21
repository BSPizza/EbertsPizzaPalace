<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Startseite">
    <meta name="author" content="CPAA JNIK">
    <link rel="icon" href="./favicon.ico">

    <title>Meine Daten MacAPPLE</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="./assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Molle:400italic' rel='stylesheet' type='text/css'>
	
	<!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./dist/js/bootstrap.js"></script>
	
	<?php
session_start();
	//global requires and includes
	require("./dist/php/menu.php");
	require("./dist/php/loeschen.php");
	require("./dist/php/aendern.php");
	require("./dist/php/lastOrders.php");
		
	?>
  </head>

  <body>

	<?php 
		//phpinfo();
		
		if (isset($_SESSION['username'])) {
			$isLoggedIn = true;
		} else {
		   $isLoggedIn = false;
		}
		
		
		$isAdmin = false;
		$warenkorbCount = 0;
		$selectedItem = -1;
		
		$benutzer = $_SESSION['username'];
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
		$daten = ladeDatenBenutzer($benutzer);
		
		$arrayOrders = letzteBestellungen($benutzer);
	?>

    <div class="container">
		<div class="container theme-showcase" role="main" name="placeholder-banner">
			<br>
			<div class="jumbotron">
				<h1>MacAPPLE</h1>
				<br><br><br><br>
			</div>
		</div>
		
	<div class="row" style="margin-left:15px;margin-right:15px;">
		<div class="jumbotronDaten" style="position: relative; width: 55em; float: left;">
			<form class="form-signin" method="POST">
				<div class="col-sm-8">
					<h2>Mein Account</h2>
					<label for="inputVorname" class="sr-only">Vorname</label>
					<input type="text" id="inputVorname" class="form-control" name="inputVorname" placeholder="Vorname: <?php echo $daten[0] ?>" >
					<label for="inputNachname" class="sr-only">Nachname</label>
					<input type="text" id="inputNachname" class="form-control" name="inputNachname" placeholder="Nachname: <?php echo $daten[1] ?>" >
					<label for="inputStrasse" class="sr-only">Straße</label>
					<input type="text" id="inputStrasse" class="form-control" name="inputStrasse" placeholder="Straße / Hausnummer: <?php echo $daten[2] ?>" >
					<label for="inputPLZ" class="sr-only">PLZ</label>
					<input type="text" id="inputPLZ" class="form-control" name="inputPLZ" placeholder="PLZ: <?php echo $daten[3] ?>" >
					<label for="inputOrt" class="sr-only">Ort</label>
					<input type="text" id="inputOrt" class="form-control" name="inputOrt" placeholder="Ort: <?php echo $daten[4] ?>" >
					<br>
					<label for="inputAltesPasswort" class="sr-only">Altes Passwort</label>
					<input type="password" id="inputAltesPasswort" class="form-control" name="inputAltesPasswort" placeholder="Altes Passwort" >
					<label for="inputPasswortNeu" class="sr-only">Neues Passwort</label>
					<input type="password" id="inputPasswortNeu" class="form-control" name="inputPasswortNeu" placeholder="Neues Passwort" >
					<label for="inputPasswortNeuW" class="sr-only">Passwort Wiederholung</label>
					<input type="password" id="inputPasswortNeuW" class="form-control" name="inputPasswortNeuW" placeholder="Passwort Wiederholung" >
					<br>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="aendern" value="aendern" style="font-size: 21px;font-weight: 200;">Daten ändern</button>
				</div>
			</form>
			<form class="form-signin" method="POST">
				<div class="col-sm-4" style="padding-top: 20px;">
					<a href="#myModal" data-toggle="modal"><button class="btn btn-sm btn-primary btn-block" type="submit" name="loeschen" value="loeschen" style="font-size: 21px;font-weight: 200;">Account löschen</button></a>
					<!-- Modal HTML -->
					<div id="myModal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Account <?php echo $benutzer ?> löschen</h4>
								</div>
								<div class="modal-body">
									<p>Möchten Sie den Account <?php echo $benutzer ?> wirklich löschen?</p>
									<label for="inputPasswortLoeschen" class="sr-only">Passwort</label>
									<input type="password" id="inputPasswortLoeschen" class="form-control" name="inputPasswortLoeschen" placeholder="Passwort" style="width: 300px;" required autofocus>
									<br>
									<div id="FehlermeldungLoeschen" style ="display: inline;">
										
									</div>
									<br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
									<button type="submit" name="bestaetigen" value="bestaetigen" class="btn btn-primary">Bestätigen</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<?php
		if (!empty($_POST['bestaetigen'])){
			$passwort = htmlentities (strip_tags ($_POST['inputPasswortLoeschen']));
			$username = $_SESSION['username'];

			loeschen($username, $passwort);
		}
		
		if (!empty($_POST['aendern'])){
			$inputVorname = htmlentities (strip_tags ($_POST['inputVorname']));
			$inputNachname = htmlentities (strip_tags ($_POST['inputNachname']));
			$inputStrasse = htmlentities (strip_tags ($_POST['inputStrasse']));
			$inputPLZ = htmlentities (strip_tags ($_POST['inputPLZ']));
			$inputOrt = htmlentities (strip_tags ($_POST['inputOrt']));
			
			
			$inputAltesPasswort = htmlentities (strip_tags ($_POST['inputAltesPasswort']));
			$inputPasswortNeu = htmlentities (strip_tags ($_POST['inputPasswortNeu']));
			$inputPasswortNeuW = htmlentities (strip_tags ($_POST['inputPasswortNeuW']));
			
			aenderungenVerarbeiten($inputVorname, $inputNachname, $inputStrasse, $inputPLZ, $inputOrt, $inputAltesPasswort, $inputPasswortNeu, $inputPasswortNeuW, $benutzer);
			//loeschen($username, $passwort);
		}
		?>
		
		<div class="jumbotronNews" style="position: relative; float:right; width: 20em; margin-left: 4em;">
			<h2>Letzte Bestellungen:</h2>
			<table class="table" width="100%">
			  <thead>
			   <tr>
				  <th>Datum</th>
				  <th>Preis</th>
			   </tr>
			  </thead>
			  <tbody>
			   <?php
				
				while($result = mysql_fetch_assoc($arrayOrders)) {
					echo '
						<tr>
							<td>'.$result['Date'].'</td>
							<td><a href="#bestellModal'.$result['ID'].'" data-toggle="modal">'.$result['TotalPrice'].'€</a></td>
						<div id="bestellModal'.$result['ID'].'" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Bestellung vom '.$result['Date'].'</h4>
									</div>
									<div class="modal-body">
										<div class="rTable">
											<div class="rTableRow">
												<div class="rTableHead"><strong>Name</strong></div>
												<div class="rTableHead"><strong>Zusatzinformationen</strong></div>
												<div class="rTableHead"><strong>Anzahl</strong></div>
											</div>
											<div class="rTableRow">
												<div class="rTableCell">John</div>
												<div class="rTableCell">Pfeffer</div>
												<div class="rTableCell">5</div>
											</div> 
										</div>
									</div>
									<div class="modal-footer">
										<p style="float: left; font-size: 16px;" vertical-align="center">Gesamtpreis: '.$result['TotalPrice'].'€</p>
										<button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button>
									</div>
								</div>
							</div>
						</div>
						</tr>
					';
				}
				
			   ?>
			  </tbody>
			</table> 
			
		</div>
	</div>
	
	
	
	<br><br><br>
	</div>
	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <p style="margin-left: 45%; color: #FFFFFD;">Copyright © iPizza 2016</p>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	

  </body>
</html>