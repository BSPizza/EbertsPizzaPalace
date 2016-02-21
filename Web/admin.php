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

    <title>Anmelden / Registrieren MacAPPLE</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">
	
	<!-- Bootstrap addon for select -->
	<link href="./dist/css/bootstrap-select.css" rel="stylesheet">

	<!-- Bootstrap addon for datepicker -->
	<link href="./dist/css/datepicker.css" rel="stylesheet">
	
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
		//global requires and includes
		require("./dist/php/menu.php");
		require("./dist/php/adminscripts.php");
		$limit = 3; //defines the limit for statistics
		

		if(!empty($_POST['newMenueSubmit']))
		{//handle everything for a new menue submit
			$name =$_POST['newMenueName'];
			$cat =$_POST['newMenueCategory'];
			$prod =$_POST['newMenueProducts'];
			$dis =$_POST['newMenueDiscount'];
			
			saveNewMenue($name, $cat, $dis, $prod);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "erstelle neues Menue mit Namen: ".$name;
			echo " in Kategorie: ".$cat;
			echo " mit folgenden Produkten:".$prod;
			if($prod)
			{
				foreach($prod as $id)
				{
					echo " ".$id;
				}	
			}		
			echo " und einem Rabatt von:".$dis."%";
			echo "\");";
			echo "</script>";
			*/				
		}
	
		if(!empty($_POST['delMenueSubmit']))
		{//handle everything to delete a menue
			$toDel = $_POST['delMenueItem'];
			delMenueItem($toDel);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo $toDel;				
			echo "\");";
			echo "</script>";*/
		}
	
		if(!empty($_POST['editMenueSubmit']))
		{//handle everything to edit a menue
			$id = $_POST['editMenueItem'];
			$name =$_POST['editMenueName'];
			$cat =$_POST['editMenueCategory'];
			$prod =$_POST['editMenueProducts'];
			$dis =$_POST['editMenueDiscount'];
	
			changeExistingMenue($id, $name, $cat, $dis, $prod);
			/*//debug info
				echo "<script language=\"javascript\">";
				echo "alert(\"";
				echo "Change ID ".$id;
				echo "Set Name to ".$name;				
				echo "Set Category to ".$cat;				
				echo "Replace Producsts with";				
				if($prod)
				{
					foreach($prod as $id)
					{
						echo " ".$id;
					}	
				}	
				echo "Change Discount to".$dis;				
				echo "\");";
				echo "</script>";*/
		}
	
	
	
		if(!empty($_POST['newProductSubmit']))
		{//handle everything for a new product submit
			$name =$_POST['newProductName'];
			$cat =$_POST['newProductCategory'];
			$ing =$_POST['newProductIngredients'];
			$eVal =$_POST['newProductEnergyValue'];
			$pric =$_POST['newProductPrice'];

			
			saveNewProduct($name, $eVal, $pric, $cat, $ing);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "erstelle neues Produkt mit Namen: ".$name;
			echo " in Kategorie: ".$cat;
			echo " mit folgenden Zutaten:".$ing;
			if($ing)
			{
				foreach($ing as $id)
				{
					echo " ".$id;
				}	
			}		
			echo " einem Energiewert von:".$eVal;
			echo " und einem Preis von:".$pric."€";
			echo "\");";
			echo "</script>";
			*/
		}
	
		if(!empty($_POST['delProductSubmit']))
		{//handle everything to delete a product
			$toDel = $_POST['delProductItem'];
			delProductItem($toDel);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo $toDel;				
			echo "\");";
			echo "</script>";*/
		}
	
		if(!empty($_POST['editProductSubmit']))
		{//handle everything to edit a product
			$id = $_POST['editProductItem'];
			$name =$_POST['editProductName'];
			$cat =$_POST['editProductCategory'];
			$ing =$_POST['editProductIngredients'];
			$eVal =$_POST['editProductEnergyValue'];
			$pric =$_POST['editProductPrice'];
				
			changeExistingProduct($id, $name, $eVal, $pric, $cat, $ing);
			/*//debug info
				echo "<script language=\"javascript\">";
				echo "alert(\"";
				echo "Change ID ".$id;
				echo "Set Name to ".$name;				
				echo "Set Category to ".$cat;				
				echo "Replace Ingredients with";				
				if($ing)
				{
					foreach($ing as $id)
					{
						echo " ".$id;
					}
				}	
				echo "Change Price to ".$pric;	
				echo "And EnergyValue to ".$eVal;				
				echo "\");";
				echo "</script>"; */
		}
	
	
	
		if(!empty($_POST['newIngredientSubmit']))
		{//handle everything for a new product submit
			$name =$_POST['newIngredientName'];

			
			saveNewIngredient($name);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "erstelle neue Zutat mit Namen: ".$name;
			echo "\");";
			echo "</script>";
			*/
		}
	
		if(!empty($_POST['delIngredientSubmit']))
		{//handle everything to delete a product
			$toDel = $_POST['delIngredientItem'];
			delIngredientItem($toDel);
			/*//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo $toDel;				
			echo "\");";
			echo "</script>";*/
		}
	
		if(!empty($_POST['editIngredientSubmit']))
		{//handle everything to edit a product
			$id = $_POST['editIngredientItem'];
			$name =$_POST['editIngredientName'];			
				
			changeExistingIngredient($id, $name);
			/*//debug info
				echo "<script language=\"javascript\">";
				echo "alert(\"";
				echo "Change ID ".$id;
				echo "Set Name to ".$name;				
				echo "\");";
				echo "</script>"; */
		}
	
	
	
		if(!empty($_POST['newDiscountSubmit']))
		{//handle everything for a new product submit
			$name = $_POST['newDiscountName'];
			$begin = $_POST['newDiscountBegin'];
			$end = $_POST['newDiscountEnd'];
			$discount = $_POST['newDiscountValue'];
			
			saveNewDiscount($name, $begin, $end, $discount);
			//debug info
			/*echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "erstelle neue Rabattaktion mit Namen: ".$name;
			echo "die am ".$begin." startet";
			echo "am ".$end." endet";
			echo "und einen Rabatt von ".$discount."% bietet";
			echo "\");";
			echo "</script>";*/
			
		}
	
		if(!empty($_POST['delDiscountSubmit']))
		{//handle everything to delete a product
			$toDel = $_POST['delDiscountItem'];
			
			delDiscountItem($toDel);
			//debug info
			/*echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo $toDel;				
			echo "\");";
			echo "</script>";*/
		}
	
		if(!empty($_POST['editDiscountSubmit']))
		{//handle everything to edit a product
			$itemID = $_POST['editDiscountItem'];
			$name = $_POST['editDiscountName'];
			$begin = $_POST['editDiscountBegin'];
			$end = $_POST['editDiscountEnd'];
			$discount = $_POST['editDiscountValue'];		
				
			changeExistingDiscount($itemID,$name,$begin,$end,$discount);
			//debug info
			/*echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "Change ID ".$id;
			echo "Set Name to ".$name;
			echo "Change begin to".$begin;
			echo "End to ".$end;
			echo "and discount to".$discount;
			echo "\");";
			echo "</script>"; */
		}
	
	
	
	if(!empty($_POST['newCategorySubmit']))
		{//handle everything for a new product submit
			$name = $_POST['newCategoryName'];
			$super = $_POST['newCategorySupercategory'];
			
			//saveNewDiscount($name, $begin, $end, $discount);
			//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "erstelle neue Kategorie: ".$name;			
			echo "als Unterkategorie von ".$super."";
			echo "\");";
			echo "</script>";
			
		}
	
		if(!empty($_POST['delCategorySubmit']))
		{//handle everything to delete a product
			$toDel = $_POST['delCategoryItem'];
			
			//delCategoryItem($toDel);
			//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo $toDel;				
			echo "\");";
			echo "</script>";
		}
	
		if(!empty($_POST['editCategorySubmit']))
		{//handle everything to edit a product
			$itemID = $_POST['editCategoryItem'];
			$name = $_POST['editCategoryName'];
			$superCategory = $_POST['editCategorySupercategory'];
			
				
			//changeExistingDiscount($itemID,$name,$begin,$end,$discount);
			//debug info
			echo "<script language=\"javascript\">";
			echo "alert(\"";
			echo "Change ID ".$id;
			echo "Set Name to ".$name;
			echo "Change SuperCategory to".$superCategory;			
			echo "\");";
			echo "</script>";
		}
	
	
	
	?>
	
  </head>

  <body>  
	<?php 
		//phpinfo();
				
		$isLoggedIn = true;
		$isAdmin = true;
		$warenkorbCount = 0;
		$selectedItem = -3;
		
		
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
		?>
	
	
    <div class="row">
		<div class="container theme-showcase" role="main" name="placeholder-banner">
			<br>
			<div class="jumbotron">
				<h1>MacAPPLE</h1>
				<br><br><br><br>
			</div>
		</div>
	</div>

	<div class="row" style="margin-left:15px;margin-right:15px;">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Menüs</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							
							echo"<form method=\"post\">";
							echo"Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newMenueName\"><br/>";
							echo"Kategorie: <select name=\"newMenueCategory\" data-size=5>";
							
							//generate categories
							$array = getSubCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>Produkte:";
							echo"<select name=\"newMenueProducts[]\" data-size=5 multiple>";
							
							//generate products
							$array = getProductsWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Rabatt: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newMenueDiscount\"><br/>";
							echo"<center><input type=\"submit\" name=\"newMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							
							echo"<form method=\"post\">";
							echo"Menü: <select name=\"delMenueItem\" data-size=5>";
							
							//generate categories
							$array = getMenuesWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";						
							echo"<center><input type=\"submit\" name=\"delMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Menü: <select name=\"editMenueItem\" data-size=5>";
							
							//generate menues
							$array = getMenuesWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";
							echo"Neuer Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editMenueName\"><br/>";
							echo"Neue Kategorie: <select name=\"editMenueCategory\" data-size=5>";
							
							//generate categories
							$array = getSubCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>Produkte:";
							echo"<select name=\"editMenueProducts[]\" multiple>";
							
							//generate products
							$array = getProductsWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Neuer Rabatt: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editMenueDiscount\"><br/>";
							echo"<center><input type=\"submit\" name=\"editMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Produkte</h3>
				</div>				
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductName\"><br/>";
							echo"Kategorie: <select name=\"newProductCategory\" data-size=5>";
							
							//generate categories
							$array = getSubCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>Zutaten:";
							echo"<select name=\"newProductIngredients[]\" data-size=5 multiple>";
							
							//generate ingredients
							$array = getIngredients();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Energiewert: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductEnergyValue\"><br/>";
							echo"Price: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductPrice\"><br/>";
							echo"<center><input type=\"submit\" name=\"newProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							
							echo"<form method=\"post\">";
							echo"Produkt: <select name=\"delProductItem\">";
							
							//generate categories
							$array = getProductsWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";						
							echo"<center><input type=\"submit\" name=\"delProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Produkt: <select name=\"editProductItem\">";
							
							//generate products
							$array = getProductsWithCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";
							echo"Neuer Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductName\"><br/>";
							echo"Neue Kategorie: <select name=\"editProductCategory\">";
							
							//generate categories
							$array = getSubCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>Zutaten:";
							echo"<select name=\"editProductIngredients[]\" multiple>";
							
							//generate ingredients
							$array = getIngredients();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Energiewert: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductEnergyValue\"><br/>";
							echo"Price: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductPrice\"><br/>";
							echo"<center><input type=\"submit\" name=\"editProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						?>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Zutaten</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newIngredientName\"><br/>";
							echo"<center><input type=\"submit\" name=\"newIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							
							echo"<form method=\"post\">";
							echo"Zutat: <select name=\"delIngredientItem\" data-size=5>";
							
							//generate ingredients
							$array = getIngredients();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";						
							echo"<center><input type=\"submit\" name=\"delIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Produkt: <select name=\"editIngredientItem\" data-size=5>";
							
							//generate ingredients
							$array = getIngredients();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
						
							echo"</select><br/>";
							echo"Neuer Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editIngredientName\"><br/>";
							echo"<center><input type=\"submit\" name=\"editIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Rabattaktionen</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Name der Aktion: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newDiscountName\"><br/>";
							echo"Startdatum: <input type=\"text\" class=\"datepicker form-control-nosize\" data-format=\"dd/mm/yyyy\" style=\"width:220px\" name=\"newDiscountBegin\"><br/>";
							echo"Enddatum: <input type=\"text\" class=\"datepicker form-control-nosize\" style=\"width:220px\" name=\"newDiscountEnd\"><br/>";
							echo"Rabatt in %: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newDiscountValue\"><br/>";
							echo"<center><input type=\"submit\" name=\"newDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Speichern\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							echo"<form method=\"post\">";
							echo"Aktion: <select name=\"delDiscountItem\" data-size=5>";
							
							$array = getDiscounts();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"<center><input type=\"submit\" name=\"delDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Aktion: <select name=\"editDiscountItem\" data-size=5>";
							
							$array = getDiscounts();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Neuer Name: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editDiscountName\"><br/>";
							echo"Startdatum: <input type=\"text\" class=\"datepicker form-control-nosize\" data-format=\"dd/mm/yyyy\" style=\"width:220px\" name=\"editDiscountBegin\"><br/>";
							echo"Enddatum: <input type=\"text\" class=\"datepicker form-control-nosize\" style=\"width:220px\" name=\"editDiscountEnd\"><br/>";
							echo"Rabatt in %: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editDiscountValue\"><br/>";
							echo"<center><input type=\"submit\" name=\"editDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Kategorien</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"Name der Kategorie: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newCategoryName\"><br/>";
							echo"Übergeordnete Kategorie: <select name=\"newCategorySupercategory\" data-size=5>";
							echo "<option value=\"0\">Keine übergeordnete Kategorie</option>";
							$menues = getMenuHeaderStrings();											
							foreach($menues as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							echo "</select><br />";
							
							echo"<center><input type=\"submit\" name=\"newCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Speichern\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							echo"<form method=\"post\">";
							echo"Kategorie: <select name=\"delCategoryItem\" data-size=5>";
							
							$array = getCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"<center><input type=\"submit\" name=\"delCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>";
							echo"</form>";
						?>
					</div>
					<div class="col-sm-4">
						<?php 
							echo"<form method=\"post\">";
							echo"<form method=\"post\">";
							echo"Kategorie: <select name=\"editCategoryItem\" data-size=5>";
							
							$array = getCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							
							echo"</select><br />";
							echo"Name der Kategorie: <input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editCategoryName\"><br/>";
							echo"Übergeordnete Kategorie: <select name=\"editCategorySupercategory\" data-size=5>";
							echo "<option value=\"0\">Keine übergeordnete Kategorie</option>";
							$menues = getMenuHeaderStrings();											
							foreach($menues as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							echo "</select><br />";
							echo"<center><input type=\"submit\" name=\"editCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						?>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div class="row" style="margin-left:15px;margin-right:15px;">
	
	<center>
		<a href="#myModal" data-toggle="modal">
			<button type="button" class="btn btn-sm btn-default" style="margin-left:15px;width:150px;">Statistiken anzeigen</button>
		</a>
		<!-- Modal HTML -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Statistiken</h4>
					</div>
					<div class="modal-body">
					
					<div class="col-sm-6">
						<?php
						echo"
						<center><b><h5>Top ".$limit." Produkte ".date('F')."</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopProductsOfMonth($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";
						echo"
						<center><b><h5>Top ".$limit." Produkte ".date('Y')."</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopProductsOfYear($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";
						echo"
						<center><b><h5>Top ".$limit." Produkte Gesamt</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopProducts($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";
						?>
					</div>
					<div class="col-sm-6">
						<?php
						echo"
						<center><b><h5>Top ".$limit." Menüs ".date('F')."</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopMenuesOfMonth($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";;
						echo"
						<center><b><h5>Top ".$limit." Menüs ".date('Y')."</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopMenuesOfYear($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";
						echo"
						<center><b><h5>Top ".$limit." Menüs Gesamt</h5></b></center>
						<table class=\"table table-striped\">
							<tbody>";
								$array = getTopMenues($limit);
								if($array)
								foreach($array as $subArray)
								{
									echo"<tr>
										<td>".$subArray[0]."</td>
										<td>".$subArray[1]."</td>
										</tr>";
								}
								echo"								
							</tbody>
						</table>
						<br/>";
						?>
					</div>


					
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					</div>
				</div>
			</div>
		</div>
	</center>
	</div>

	<br/>
	<br/>
	<br/>
	<br/>
		
		
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <p style="margin-left: 45%; color: #FFFFFD;">Copyright © iPizza 2016</p>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./dist/js/bootstrap.min.js"></script>
	<script src="./dist/js/bootstrap-select.js"></script>
	<script src="./dist/js/bootstrap-datepicker.js"></script>
	<script>
		$(document).ready(function(){
			$('select').selectpicker();
			$('.datepicker').datepicker();
		});
	</script>
	
	<!--scripts handling the sql connection-->
	<script src="./dist/js/sqlScripts.js"></script>

  </body>
</html>