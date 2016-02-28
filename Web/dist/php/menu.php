<?php

require("mysql.php");

function echoMenu($selectedTabID, $isLoggedIn, $isAdmin, $warenkorbCount)
{
  echo "
	<nav class=\"navbar navbar-inverse navbar-fixed-top\">
		<div class=\"container>
			<div class=\"navbar-header\">
				<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
				</button>
				<a class=\"navbar-brand\" href=\"index.php\">Startseite</a>
			</div>
			<div id=\"navbar\" class=\"collapse navbar-collapse\">
				<ul class=\"nav navbar-nav\">";
				
				$arrayNames = getMenuHeaderStrings(); //return an array of arrays[2]{tag,name}
				$length = count($arrayNames);
				
				//home is id == -1
				if($selectedTabID==-1)
				{
					echo "<li class=\"active\"><a href=\"index.php\">Home</a></li>";
				}
				else
				{
					echo "<li><a href=\"index.php\">Home</a></li>";
				}
				
				//after home add all supercategories
				for($intI = 0; $intI<$length; $intI++)
				{
					if($selectedTabID==intval($arrayNames[$intI][0])) //select this one
					{
					echo "<li class=\"active\"><a href=\"products.php?id=".$arrayNames[$intI][0]."\">".$arrayNames[$intI][1]."</a></li>";
					}
					else
					{
					echo "<li><a href=\"products.php?id=".$arrayNames[$intI][0]."\">".$arrayNames[$intI][1]."</a></li>";
					}
				}
				
				//after supercategories add warenkorb and myaccount
				//warenkorb is id == -2
				if($selectedTabID==-2)
				{
					echo "<li class=\"active\"><a href=\"cart.php\">Warenkorb($warenkorbCount)</a></li>";
				}
				else
				{
					echo "<li><a href=\"cart.php\">Warenkorb($warenkorbCount)</a></li>";
				}
				
				//my account / admin == -3
				if($selectedTabID==-3)
				{
					if($isLoggedIn&&$isAdmin)
					{
					echo "<li class=\"active\"><a href=\"admin.php\">Adminbereich</a></li>";
					}
					else if($isLoggedIn)
					{
					echo "<li class=\"active\"><a href=\"account.php\">Mein Account</a></li>";
					}
					else
					{
					echo "<li class=\"active\"><a href=\"anmelden.php\">Einloggen/Registrieren</a></li>";
					}
				}
				else
				{
					if($isLoggedIn&&$isAdmin)
					{
					echo "<li><a href=\"admin.php\">Adminbereich</a></li>";
					}
					else if($isLoggedIn)
					{
					echo "<li><a href=\"account.php\">Mein Account</a></li>";
					}
					else
					{
					echo "<li><a href=\"anmelden.php\">Einloggen/Registrieren</a></li>";
					}
				}
				
				if($isLoggedIn){
					echo "<li><a href=\"ausloggen.php\">Ausloggen</a></li>";
				}
				
				echo "</ul>
				<div class=\"navbar-header\" style=\"position: right; padding-left: 400px\">
					<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
					</button>
				</div>
			</div>
		</div>
	</nav>
  
	<div class=\"container theme-showcase\" role=\"main\" name=\"placeholder-banner\">
		<br>
		<div class=\"jumbotron\">
			<h1>MacAPPLE</h1>
			<br><br><br><br>
		</div>
	</div>";
  return 0;
}
