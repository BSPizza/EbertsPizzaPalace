<?php

	function letzteBestellungen($benutzer){
		$con = mysql_connect('localhost','root','');
		mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT o.Date, i.TotalPrice, i.ID FROM Customers c, Orders o, Invoices i WHERE c.ID = o.CustomerID AND o.ID = i.OrderID AND c.Login = '$benutzer' ORDER BY o.Date LIMIT 10";
		
		$results = mysql_query($sql, $con);
		
		mysql_close($con);
	
		return $results;
	}
	
	function letzteBestellungenExtended(){
		
		
		
		
	}

?>