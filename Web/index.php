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

    <title>Startseite MacAPPLE</title>

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
	
	<?php
session_start();
	//global requires and includes
	require("./dist/php/menu.php");
		
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
		
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
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
		<div class="jumbotronDaten" style="position: relative; width: 45em; float: left;">
			<div style="float: left; width: 100px; margin-top: 20px; padding-left: 50px;">
				<img title="" src="sticker.png" alt="" width="200" height="200" />
			</div>
			<div style="margin-left: 250px; padding-left: 50px; margin-top: 50px;">
				<p>MacAPPLE GmbH<br>Teststraße 1<br>11111 Teststadt<br>Tel.: 0177 564 9988<br>Fax: 0177 564 9987</p>
			</div>
			<br><br><br>
			<p>Vorbestellungen können bis zu einer Woche im Vorraus aufgegeben werden.</p>
			<p>Bestellungen zum Ausliefern nehmen wir bis 45 Minuten vor Geschäftsschluss an.</p>
		</div>
		<div class="jumbotronNews" style="position: relative; float:right; width: 30em; margin-left: 4em;">
			<h2>Unsere Öffnungszeiten:</h2>
			<p>Montag bis Freitag von 11.30 Uhr - 14.00 Uhr und 17.30 Uhr - 22.30 Uhr</p>
			<p>Samstag, Sonntag und Feiertag von 17.30 Uhr - 22.30 Uhr</p>
			<br><br>
			<h2>Wir beliefern Sie nach:</h2>
			<p>Erlangen - Liefergebühr 1,50€‚</p>
			<p>Uttenreuth, Marloffstein, Bubenreuth - Liefergebühr 2,50€‚</p>
			<p>Möhrendorf, Neunkirchen, Dormitz - Liefergebühr 3,50€</p>
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
	
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./dist/js/bootstrap.min.js"></script>
  </body>
</html>