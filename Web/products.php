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

    <title>MacAPPLE-Produkte</title>

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
	require("./dist/php/products.php");
	require("./dist/php/cart.php");
	
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
		if(isset($_SESSION['isAdmin']))
		{
			$isAdmin = $_SESSION['isAdmin'];
		}
		else
		{
			$isAdmin = false;	
		}
		
		$warenkorbCount = warenkorbCount();				
		$ID = $_GET["id"];
		
		echoMenu($ID,$isLoggedIn,$isAdmin,$warenkorbCount);
		$arraySuperKategorien = ladeSuperKategorien($ID);
	?>

    <div class="container">

		
	<div class="container">

		  <ul class="nav nav-tabs">
			<?php
				/*
				while($result = mysql_fetch_assoc($arraySuperKategorien)) {
					echo '<li><a href="#'.$result['Name'].'">'.$result['Name'].'</a></li>';
					mysql_data_seek($arraySuperKategorien, 0);
				}*/
				
				foreach($arraySuperKategorien as $array)
				{
					echo '<li><a href="#'.$array['Name'].'">'.$array['Name'].'</a></li>';
				}
				
			?>
		  </ul>

		  <div class="tab-content">
		  
			<?php
				/*
				while($result2 = mysql_fetch_assoc($arraySuperKategorien)) {
					echo' <div id="'.$result2['Name'].'" class="tab-pane fade">
					  <table class="table" width="100%">
						  <thead>
						   <tr>
							  <th>Name</th>
							  <th>Zusatzinformationen</th>
							  <th>Preis</th>
							  <th>Kaufen</th>
						   </tr>
						  </thead>
						  <tbody>
						  ';
						  $arrayLadeInhalt = ladeInhalt($result2['ID']);
						  
						  while($result3 = mysql_fetch_assoc($arrayLadeInhalt)) {
							   echo'<tr>
								  <td>'.$result3['Name'].'</td>
								  <td>'.$result3['Zutaten'].'</td>
								  <td>'.$result3['Price'].'€</td>
								  <form class="form-signin" method="POST">
									<td><button type="submit" name="kaufen" value="'.$result3['ID'].'" class="btn btn-primary">Kaufen</button></td>
								  </form>
							   </tr>';
						   }
						  echo '</tbody>
						</table> 
					</div>';
				}*/
				foreach($arraySuperKategorien as $array)
				{
					echo' <div id="'.$array['Name'].'" class="tab-pane fade">
					  <table class="table" width="100%">
						  <thead>
						   <tr>
							  <th>Name</th>
							  <th>Zusatzinformationen</th>
							  <th>Preis</th>
							  <th>Kaufen</th>
						   </tr>
						  </thead>
						  <tbody>
						  ';
						  $arrayLadeInhalt = ladeInhalt($array['ID']);
						  
						  foreach($arrayLadeInhalt as $subrow)
						  {
							  echo '<tr>
								  <td>'.$subrow['Name'].'</td>
								  <td>'.$subrow['Zutaten'].'</td>
								  <td>'.$subrow['Price'].'€</td>
								  <form class="form-signin" method="POST">
									<td><button type="submit" name="kaufen" value="'.$subrow['ID'].'" class="btn btn-primary">Kaufen</button></td>
								  </form>
							   </tr>';
						  }
						  echo '</tbody>
						</table> 
					</div>';
				}
				
				
				if (!empty($_POST['kaufen'])){
					$kaufProduktID = $_POST['kaufen'];
					
					warenkorbHinzufuegen($kaufProduktID, $warenkorbCount);
				}
				
			?>
			
			
		  </div>
  
  
  
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>


	<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <p style="margin-left: 45%; color: #FFFFFD;">Copyright © iPizza 2016</p>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	

  </body>
</html>