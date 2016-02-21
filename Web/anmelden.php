<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Startseite">
    <meta name="author" content="CPAA JNIK">
    <link rel="icon" href="../../favicon.ico">

    <title>Anmelden / Registrieren MacAPPLE</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">
	
	<!-- Bootstrap addon for select -->
	<link href="./dist/css/bootstrap-select.css" rel="stylesheet">

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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
	
	<?php
	//global requires and includes
	require("./dist/php/menu.php");
	require("./dist/php/regi.php");
	require("./dist/php/anmelden1.php");
	?>
	
  </head>

  <body>

	<?php 
		//phpinfo();
				
		$isLoggedIn = false;
		$isAdmin = false;
		$warenkorbCount = 0;
		$selectedItem = -1;
		
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
	?>

    <div class="container">
		<div class="container theme-showcase" role="main">
			<br>
			<div class="jumbotron">
				<h1>MacAPPLE</h1>
				<br><br><br><br>
			</div>
		</div>
		
		<div style="position:relative; margin-right: 30%; margin-left: 30%; width: 500px;" class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="font-size: 21px;font-weight: 200;"><center>Anmelden</center></h3>
				</div>
				<div class="panel-body">
					<form class="form-signin" method="POST">
						<label for="inputBenutzer" class="sr-only">Benutzername</label>
						<input type="text" id="inputBenutzer" class="form-control" placeholder="Benutzername" name="inputBenutzer" required autofocus>
						<label for="inputPassword" class="sr-only">Passwort</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Passwort" name="inputPassword"  required>
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="anmelden" value="anmelden" style="font-size: 21px;font-weight: 200;">Anmelden</button>
					</form>
				</div>
			</div>
		</div>
		
		<?php
			if (!empty($_POST['anmelden'])){
				$inputBenutzer = htmlentities (strip_tags ($_POST['inputBenutzer']));
				$inputPassword = htmlentities (strip_tags ($_POST['inputPassword']));
				
				anmelden($inputBenutzer, $inputPassword);
			}
		?>
		
		<br><br><br>
		
		<div style="position:relative; margin-right: 30%; margin-left: 30%; width: 500px;" class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="font-size: 21px;font-weight: 200;"><center>Registrieren</center></h3>
				</div>
				<div class="panel-body">
					<form class="form-signin" method="POST">
						<label for="inputVorname" class="sr-only">Vorname</label>
						<input type="text" id="inputVorname" class="form-control" name="inputVorname" placeholder="Vorname" required autofocus>
						<label for="inputNachname" class="sr-only">Nachname</label>
						<input type="text" id="inputNachname" class="form-control" name="inputNachname" placeholder="Nachname" required>
						<label for="inputStrasse" class="sr-only">Straße</label>
						<input type="text" id="inputStrasse" class="form-control" name="inputStrasse" placeholder="Straße / Hausnummer" required>
						<label for="inputPLZ" class="sr-only">PLZ</label>
						<input type="text" id="inputPLZ" class="form-control" name="inputPLZ" placeholder="PLZ" required>
						<label for="inputOrt" class="sr-only">Ort</label>
						<input type="text" id="inputOrt" class="form-control" name="inputOrt" placeholder="Ort" required>
						<br>
						<label for="inputBenutzername" class="sr-only">Benutzername</label>
						<input type="text" id="inputBenutzername" class="form-control" name="inputBenutzername" placeholder="Benutzername" required>
						<label for="inputPasswortRegi" class="sr-only">Passwort</label>
						<input type="password" id="inputPasswortRegi" class="form-control" name="inputPasswortRegi" placeholder="Passwort" required>
						<label for="inputPasswortRegiW" class="sr-only">Passwort Wiederholung</label>
						<input type="password" id="inputPasswortRegiW" class="form-control" name="inputPasswortRegiW" placeholder="Passwort Wiederholung" required>
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="regi" value="regi" style="font-size: 21px;font-weight: 200;">Registrieren</button>
					</form>
				</div>
			</div>
			<br><br>
		</div>
		
		<?php
			if (!empty($_POST['regi'])){
				$inputVorname = htmlentities (strip_tags ($_POST['inputVorname']));
				$inputNachname = htmlentities (strip_tags ($_POST['inputNachname']));
				$inputStrasse = htmlentities (strip_tags ($_POST['inputStrasse']));
				$inputPLZ = htmlentities (strip_tags ($_POST['inputPLZ']));
				$inputOrt = htmlentities (strip_tags ($_POST['inputOrt']));
				$inputBenutzername = htmlentities (strip_tags ($_POST['inputBenutzername']));
				$inputPasswortRegi = htmlentities (strip_tags ($_POST['inputPasswortRegi']));
				$inputPasswortRegiW = htmlentities (strip_tags ($_POST['inputPasswortRegiW']));
				
				registrieren($inputVorname, $inputNachname, $inputStrasse, $inputPLZ, $inputOrt, $inputBenutzername, $inputPasswortRegi, $inputPasswortRegiW);
			}
		?>

		
	
	
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <p style="color: #FFFFFD;" align="center">Copyright © iPizza 2016</p>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	

  </body>
</html>