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

    <title>MacApple-Warenkorb</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
	 <link href="./dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

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
	<script type="text/javascript" src="./dist/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="./dist/js/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
	
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
		$selectedItem = -2;
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
		$_SESSION['totalPrice'] = 0;
	?>

      <div class="container">
		
		<div class="col-sm-8">
			<table width="100%" class="table">
			  <thead>
			   <tr>
				  <th>Name</th>
				  <th>Zusatzinformationen</th>
				  <th>Anzahl</th>
				  <th>Preis</th>
				  <th>Entfernen</th>
			   </tr>
			  </thead>
			  <tbody>
			  
			  <?php
				if (isset($_SESSION['cart'])) {
					foreach ($_SESSION['cart'] as &$value) {
						$arrayWarenkorbDaten = warenkorbLaden($value);
						
						while($warenkornD = mysql_fetch_assoc($arrayWarenkorbDaten)) {
						
						echo '<tr>
							<td>'.$warenkornD['Name'].'</td>
							<td>'.$warenkornD['Zutaten'].'</td>
							<td>
								<form id=\'myform\' class="form-signin" method=\'POST\' action=\'#\' style="text-align: center; margin: 2%; float: left;">
									<input type=\'button\' value=\'-\' class=\'qtyminus'.$warenkornD['ID'].' btn btn-primary\' field=\'quantity'.$warenkornD['ID'].'\' style="width:25px;height:25px;"/>
									<input type=\'text\' name=\'quantity'.$warenkornD['ID'].'\' 
									';
									
									//echo '<script>
									//if (localStorage.getItem("quantity"+'.$warenkornD['ID'].') != null) {
									//	document.getElementsByName("quantity"+'.$warenkornD['ID'].')[0].value = localStorage.getItem("quantity"+'.$warenkornD['ID'].');
									//}
									//else{</script>';
									//	echo 'value=\'1\'';
									//echo '<script>}</script>';
									

									
										
											
									echo 'class=\'qty\' style="width: 40px;height: 25px;text-align: center;" readonly>
									<input type=\'button\' value=\'+\' class=\'qtyplus'.$warenkornD['ID'].' btn btn-primary\' field=\'quantity'.$warenkornD['ID'].'\' style="width:25px;height:25px;"/>
								</form>
							</td>
							<td>'.$warenkornD['Price'].'€</td>
							<form class="form-signin" method="POST">
								<td><button type="submit" name="entfernen" value="'.$warenkornD['ID'].'" class="btn btn-primary">Entfernen</button></td>
							</form>
							</tr>
							';
						echo '
							<script>
							jQuery(document).ready(function(){
						// This button will increment the value
						$(\'.qtyplus'.$warenkornD['ID'].'\').click(function(e){
							// Stop acting like a button
							e.preventDefault();
							// Get the field name
							fieldName = $(this).attr(\'field\');
							// Get its current value
							var currentVal = parseInt($(\'input[name=\'+fieldName+\']\').val());
							// If is not undefined
							if (!isNaN(currentVal)) {
								// Increment
								$(\'input[name=\'+fieldName+\']\').val(currentVal + 1);
							} else {
								// Otherwise put a 0 there
								$(\'input[name=\'+fieldName+\']\').val(1);
							}
							localStorage.setItem(fieldName, document.getElementsByName(fieldName)[0].value);
						});
						// This button will decrement the value till 0
						$(".qtyminus'.$warenkornD['ID'].'").click(function(e) {
							// Stop acting like a button
							e.preventDefault();
							// Get the field name
							fieldName = $(this).attr(\'field\');
							// Get its current value
							var currentVal = parseInt($(\'input[name=\'+fieldName+\']\').val());
							// If it isn\'t undefined or its greater than 0
							if (!isNaN(currentVal) && currentVal > 1) {
								// Decrement one
								$(\'input[name=\'+fieldName+\']\').val(currentVal - 1);
							} else {
								// Otherwise put a 0 there
								$(\'input[name=\'+fieldName+\']\').val(1);
							}
							localStorage.setItem(fieldName, document.getElementsByName(fieldName)[0].value);
						});
					});
							</script>';
							
									echo '
									<script>
									if (localStorage.getItem("quantity'.$warenkornD['ID'].'") != null) {
										document.getElementsByName("quantity'.$warenkornD['ID'].'")[0].value = localStorage.getItem("quantity'.$warenkornD['ID'].'");
										$.ajax({
											url: \'test.php\',
											type: \'post\',
											data: { "quantity'.$warenkornD['ID'].'": localStorage.getItem("quantity'.$warenkornD['ID'].'")},
											success: function(response) { 
												console.log(response);
												localStorage.setItem("gesamtPreisFeld", response);
												},
											async: false
										});
									}
									else{
										localStorage.setItem("quantity'.$warenkornD['ID'].'", "1");
										document.getElementsByName("quantity'.$warenkornD['ID'].'")[0].value = \'1\';
										$.ajax({
											url: \'test.php\',
											type: \'post\',
											data: { "quantity'.$warenkornD['ID'].'": "1"},
											success: function(response) { 
												console.log(response); 
												localStorage.setItem("gesamtPreisFeld", response);
												},
											async: false
										});
									}
									</script>';
						}
						
					}
				}
			  
			  ?>
			   
			   
			  </tbody>
			</table> 
		</div>
		
		<?php
			//foreach($gesamtPreis as $key => $value) {
			//	echo($key);
			//	echo($value);
			//}
		?>
		
		<div class="col-sm-4">
			<div class="jumbotronNews" style="position: relative; float:right; width: 20em; margin-left: 4em; height: 400px">
			
				<h3>Gesamtpreis:</h3>
				<p id="gesamtPreisFeld"> €</p>
				<script type="text/javascript">
					if (localStorage.getItem("gesamtPreisFeld") != null) {
						document.getElementById("gesamtPreisFeld").innerHTML = localStorage.getItem("gesamtPreisFeld")+" €";
					}
				</script>
				<form class="form-signin" method="POST">
					<td><button type="submit" name="aktualisieren" value="aktualisieren" class="btn btn-primary">Aktualisieren</button></td>
				</form>
				
				<form class="form-signin" method="POST">
					<h3>Lieferdatum:</h3>
					<div class="input-group">
						
						<input id="date-picker-2" type="text" class="date-picker form-control form_datetime">
						<label for="date-picker-2" class="input-group-addon btn">
							<span class="glyphicon glyphicon-remove"></span>
						</label>
						<label for="date-picker-2" class="input-group-addon btn">
							<span class="glyphicon glyphicon-calendar"></span>
						</label>
					</div>
					<script type="text/javascript">
						
							$('.form_datetime').datetimepicker({
							language:  'de',
							format: "dd MM yyyy - hh:ii",
							weekStart: 1,
							todayBtn:  1,
							autoclose: 1,
							todayHighlight: 1,
							startView: 2,
							forceParse: 0,
							showMeridian: 1
						});
					</script>
					<br><br><br>
					<td><button type="submit" name="bestellen" value="bestellen" class="btn btn-lg btn-primary">Kostenpflichtig bestellen</button></td>
				</form>
				
			</div>
		</div>

		
		<?php
		
			if (!empty($_POST['entfernen'])){
				$entfernProduktID = $_POST['entfernen'];
					
				warenkorbProduktEntfernen($entfernProduktID);
			}
			
			if (!empty($_POST['aktualisieren'])){
				echo '
				<script type="text/javascript">
					window.location.href=\'cart.php\';
				</script>
				';
			}
			
			if (!empty($_POST['bestellen'])){
				
				echo '
					<script>
					var localStorageDaten = {};
					for ( var i = 0, len = localStorage.length; i < len; ++i ) {
						localStorageDaten[localStorage.key(i)] = localStorage.getItem( localStorage.key(i));
					}
					var stringData = JSON.stringify( localStorageDaten );
					$.ajax({
						url: \'cartSave.php\',
						type: \'post\',
						data: { "daten" : stringData},
						success: function(response) { 
							console.log(response); 
							},
						async: false
					});
					</script>
				';
				
				loescheAmount();
				
				echo '
				<script type="text/javascript">
					window.location.href=\'index.php\';
				</script>
				';
				
			
			/*
				echo '
					$.ajax({
						url: \'cartSave.php\',
						type: \'post\',
						data: { "quantity'.$warenkornD['ID'].'": localStorage.getItem("quantity'.$warenkornD['ID'].'")},
						success: function(response) { 
							console.log(response);
							},
						async: false
					});
				';*/
			}
			
		?>
		
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <p style="margin-left: 45%; color: #FFFFFD;">Copyright © iPizza 2016</p>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	

  </body>
</html>