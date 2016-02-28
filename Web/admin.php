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

    <title>MacAPPLE-Administration</title>

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
		require("./dist/php/cart.php");
		$limit = 3; //defines the limit for statistics
		session_start();

		if(!empty($_POST['newMenueSubmit']))
		{//handle everything for a new menue submit
			$name = adjustVariable($_POST['newMenueName']);
			$cat = adjustVariable($_POST['newMenueCategory']);
			$prod = adjustVariable($_POST['newMenueProducts']);
			$dis = adjustVariable($_POST['newMenueDiscount']);
			
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
			$toDel = adjustVariable($_POST['delMenueItem']);
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
			$id = adjustVariable($_POST['editMenueItem']);
			$name =adjustVariable($_POST['editMenueName']);
			$cat =adjustVariable($_POST['editMenueCategory']);
			$prod =adjustVariable($_POST['editMenueProducts']);
			$dis =adjustVariable($_POST['editMenueDiscount']);
	
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
			$name =adjustVariable($_POST['newProductName']);
			$cat =adjustVariable($_POST['newProductCategory']);
			$ing =adjustVariable($_POST['newProductIngredients']);
			$eVal =adjustVariable($_POST['newProductEnergyValue']); 
			$pric =adjustVariable($_POST['newProductPrice']); 
			

			
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
			$toDel = adjustVariable($_POST['delProductItem']);
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
			$id = adjustVariable($_POST['editProductItem']);
			$name =adjustVariable($_POST['editProductName']);
			$cat =adjustVariable($_POST['editProductCategory']);
			$ing = adjustVariable($_POST['editProductIngredients']);
			$eVal =adjustVariable($_POST['editProductEnergyValue']);
			$pric =adjustVariable($_POST['editProductPrice']);
				
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
			$name =adjustVariable($_POST['newIngredientName']);

			
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
			$toDel = adjustVariable($_POST['delIngredientItem']);
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
			$id = adjustVariable($_POST['editIngredientItem']);
			$name =adjustVariable($_POST['editIngredientName']);			
				
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
			$name = adjustVariable($_POST['newDiscountName']);
			$begin = adjustVariable($_POST['newDiscountBegin']);
			$end = adjustVariable($_POST['newDiscountEnd']);
			$discount = adjustVariable($_POST['newDiscountValue']);
			
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
			$toDel = adjustVariable($_POST['delDiscountItem']);
			
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
			$itemID = adjustVariable($_POST['editDiscountItem']);
			$name = adjustVariable($_POST['editDiscountName']);
			$begin = adjustVariable($_POST['editDiscountBegin']);
			$end = adjustVariable($_POST['editDiscountEnd']);
			$discount = adjustVariable($_POST['editDiscountValue']);
				
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
			$name = adjustVariable($_POST['newCategoryName']);
			$super = adjustVariable($_POST['newCategorySupercategory']);
			
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
			$toDel = adjustVariable($_POST['delCategoryItem']);
			
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
			$itemID = adjustVariable($_POST['editCategoryItem']);
			$name = adjustVariable($_POST['editCategoryName']);
			$superCategory = adjustVariable($_POST['editCategorySupercategory']);
			
				
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
				
		$selectedItem = -3;
		$warenkorbCount = warenkorbCount();
		
		
		echoMenu($selectedItem,$isLoggedIn,$isAdmin,$warenkorbCount);
		
		//disable infos for non-admins
		if(!$isAdmin)
		{echo"<!--";}
	?>			
	<div class="row" style="margin-left:15px;margin-right:15px;">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Menüs</h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-4">
						<?php 
							if($isAdmin)
							{
								echo"<form method=\"post\">";
								echo"<center>
								<table>
									<tr>
										<td>Name: </td>
										<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newMenueName\"><br/></td>
									</tr>
									<tr>
										<td>Kategorie: </td>
										<td><select name=\"newMenueCategory\" data-size=5>";
										//generate categories
										$array = getSubCategoriesWithSuperCategories();
										foreach($array as $d)
										{
											echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
										}
										echo"</select></td>
									</tr>
									<tr>
										<td>Produkte:</td>
										<td><select name=\"newMenueProducts[]\" data-size=5 multiple>";							
										//generate products
										$array = getProductsWithCategories();
										foreach($array as $d)
										{
											echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
										}
										echo"</select></td>
									</tr>
									<tr>
										<td>Rabatt:</td>
										<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newMenueDiscount\"></td>
									</tr>
								</table></center>
								<center><input type=\"submit\" name=\"newMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>
								</form>";
							}
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
							if($isAdmin)
							{
								echo"<form method=\"post\"><center>
								Menü: <select name=\"delMenueItem\" data-size=5>";
								
								//generate categories
								$array = getMenuesWithCategories();
								foreach($array as $d)
								{
									echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
								}
							
								echo"</select></center><br/>						
								<center><input type=\"submit\" name=\"delMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>
								</form>";
							}
						?>
					</div>
					<div class="col-sm-4">
						<?php
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Menü:</td>
									<td><select name=\"editMenueItem\" data-size=5>";
									//generate menues
									$array = getMenuesWithCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Neuer Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editMenueName\"></td>
								</tr>
								<tr>
									<td>Neue Kategorie:</td>
									<td><select name=\"editMenueCategory\" data-size=5>";
									//generate categories
									$array = getSubCategoriesWithSuperCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Produkte:</td>
									<td><select name=\"editMenueProducts[]\" multiple>";
									//generate products
									$array = getProductsWithCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Neuer Rabatt:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editMenueDiscount\"></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"editMenueSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>
							</form>";
						}
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
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductName\"></td>
								</tr>
								<tr>
									<td>Kategorie:</td>
									<td><select name=\"newProductCategory\" data-size=5>";
									//generate categories
									$array = getSubCategoriesWithSuperCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Zutaten:</td>
									<td><select name=\"newProductIngredients[]\" data-size=5 multiple>";
									//generate ingredients
									$array = getIngredients();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Energiewert:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductEnergyValue\"></td>
								</tr>
								<tr>
									<td>Price:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newProductPrice\"></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"newProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
						if($isAdmin)
						{	
							echo"<form method=\"post\">
							<center>
							<table>
								<tr>
									<td>Produkt:</td>
									<td><select name=\"delProductItem\">";
									//generate categories
									$array = getProductsWithCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"delProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Produkt:</td>
									<td><select name=\"editProductItem\">";
									//generate products
									$array = getProductsWithCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Neuer Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductName\"></td>
								</tr>
								<tr>
									<td>Neue Kategorie:</td>
									<td><select name=\"editProductCategory\">";
									//generate categories
									$array = getSubCategoriesWithSuperCategories();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Zutaten:</td>
									<td><select name=\"editProductIngredients[]\" multiple>";
									//generate ingredients
									$array = getIngredients();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Energiewert:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductEnergyValue\"></td>
								</tr>
								<tr>
									<td>Price:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editProductPrice\"></td>
								</tr>
							</table></center>";
							echo"<center><input type=\"submit\" name=\"editProductSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>";
							echo"</form>";
						}
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
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center>
							<table>
								<tr>
									<td>Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newIngredientName\"></td>
								</tr>
							</table>
							</center>
							<center><input type=\"submit\" name=\"newIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Hinzufügen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
						if($isAdmin)
						{	
							echo"<form method=\"post\">
							<center>
							<table>
								<tr>
									<td>Zutat:</td>
									<td><select name=\"delIngredientItem\" data-size=5>";
									//generate ingredients
									$array = getIngredients();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"delIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Produkt:</td>
									<td><select name=\"editIngredientItem\" data-size=5>";
									//generate ingredients
									$array = getIngredients();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo"</select></td>
								</tr>
								<tr>
									<td>Neuer Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editIngredientName\"></td>
								</tr>
							</table></center> 
							<center><input type=\"submit\" name=\"editIngredientSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>
							</form>";
						}
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
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Name der Aktion:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newDiscountName\"></td>
								</tr>
								<tr>
									<td>Startdatum:</td>
									<td><input type=\"text\" class=\"datepicker form-control-nosize\" data-format=\"dd/mm/yyyy\" style=\"width:220px\" name=\"newDiscountBegin\"></td>
								</tr>
								<tr>
									<td>Enddatum:</td>
									<td><input type=\"text\" class=\"datepicker form-control-nosize\" style=\"width:220px\" name=\"newDiscountEnd\"></td>
								</tr>
								<tr>
									<td>Rabatt in %:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newDiscountValue\"></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"newDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Speichern\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center>
							<table>
							<tr>
							<td>Aktion:</td>
							<td><select name=\"delDiscountItem\" data-size=5>";
							$array = getDiscounts();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							echo"</select></td>
							</tr>
							</table></center>
							<center><input type=\"submit\" name=\"delDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Aktion:</td>
									<td><select name=\"editDiscountItem\" data-size=5>";
									
									
									$array = getDiscounts();
									foreach($array as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									
									echo"</select></td>
								</tr>
								<tr>
									<td>Neuer Name:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editDiscountName\"></td>
								</tr>
								<tr>
									<td>Startdatum:</td>
									<td><input type=\"text\" class=\"datepicker form-control-nosize\" data-format=\"dd/mm/yyyy\" style=\"width:220px\" name=\"editDiscountBegin\"></td>
								</tr>
								<tr>
									<td>Enddatum:</td>
									<td><input type=\"text\" class=\"datepicker form-control-nosize\" style=\"width:220px\" name=\"editDiscountEnd\"></td>
								</tr>
								<tr>
									<td>Rabatt in %:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editDiscountValue\"></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"editDiscountSubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>
							</form>";
						}
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
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
									<td>Name der Kategorie:</td>
									<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"newCategoryName\"></td>
								</tr>
								<tr>
									<td>Übergeordnete Kategorie:</td>
									<td><select name=\"newCategorySupercategory\" data-size=5>
									<option value=\"0\">Keine übergeordnete Kategorie</option>";
									$menues = getMenuHeaderStrings();											
									foreach($menues as $d)
									{
										echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
									}
									echo "</select></td>
								</tr>
							</table>
							</center>
							<center><input type=\"submit\" name=\"newCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Speichern\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">					
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
								<tr>
								<td>Kategorie:</td>
								<td><select name=\"delCategoryItem\" data-size=5>";
								$array = getCategoriesWithSuperCategories();
								foreach($array as $d)
								{
									echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
								}
								echo"</select></td>
								</tr>
							</table></center>
							<center><input type=\"submit\" name=\"delCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Löschen\" /></center>
							</form>";
						}
						?>
					</div>
					<div class="col-sm-4">
						<?php 
						if($isAdmin)
						{
							echo"<form method=\"post\">
							<center><table>
							<tr>
							<td>Kategorie:</td>
							<td><select name=\"editCategoryItem\" data-size=5>";
							$array = getCategoriesWithSuperCategories();
							foreach($array as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							echo"</select></td>
							</tr>
							<tr>
							<td>Name der Kategorie:</td>
							<td><input type=\"text\" class=\"form-control-nosize\" style=\"width:220px\" name=\"editCategoryName\"></td>
							</tr>
							<tr>
							<td>Übergeordnete Kategorie:</td>
							<td><select name=\"editCategorySupercategory\" data-size=5>
							<option value=\"0\">Keine übergeordnete Kategorie</option>";
							$menues = getMenuHeaderStrings();											
							foreach($menues as $d)
							{
								echo "<option value=\"".$d[0]."\">".$d[1]."</option>";
							}
							echo "</select></td>
							</tr>
							</table></center>
							<center><input type=\"submit\" name=\"editCategorySubmit\" class=\"btn btn-sm btn-default\" style=\"margin-top:10px;\" value=\"Ersetzen\" /></center>
							</form>";
						}
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
		</div>
	</center>
	</div>
	<?php 
		if(!$isAdmin)
		{
			echo"-->";
			echo "
			<div class=\"row\" style=\"margin-left:15px;margin-right:15px;\">
				<center><h1>Access denied!</h1></center>
			</div>
			";
		}
	?>	
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