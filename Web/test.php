<?php
session_start();
	
	foreach ($_SESSION['cart'] as &$value) {
		$string = "quantity".$value;
		if (isset($_POST[$string])) {
			$con = mysql_connect('localhost','root','');
			mysql_select_db('ebertspizzapalace', $con);
			$sql = "SELECT Price FROM Products WHERE ID = '$value'";
				
			$result = mysql_query($sql, $con);
			
			$price = mysql_result($result, 0, 0);
			
			mysql_close($con);
			
			$zahl = $price * $_POST[$string];
			
			$_SESSION['totalPrice'] = $_SESSION['totalPrice'] + $zahl;
		}
	}

		echo $_SESSION['totalPrice'];











?>