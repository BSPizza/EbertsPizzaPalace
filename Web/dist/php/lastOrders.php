<?php

	function letzteBestellungen($benutzer){
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		$sql = "SELECT o.Date, i.TotalPrice, i.ID, o.ID AS ORDERID FROM Customers c, Orders o, Invoices i WHERE c.ID = o.CustomerID AND o.ID = i.OrderID AND c.Login = '$benutzer' ORDER BY o.Date DESC LIMIT 10";
		
		$results = mysql_query($sql);
		
		closeConnection();
		//mysql_close($con);
	
		return $results;
	}
	
	function letzteBestellungenExtended($benutzer){
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		
		$sql = "SELECT p.Name, xpo.Amount, group_concat(i.Name) AS Zutaten, o.ID
		FROM customers c, Orders o, xproductorder xpo, products p, xproductingredient xpi, ingredients i 
		WHERE c.ID = o.CustomerID 
		AND o.ID = xpo.OrderID 
		AND xpo.ProductID = p.ID 
		AND p.ID = xpi.ProductID 
		AND xpi.IngredientID = i.ID 
		AND c.Login = '$benutzer'
		GROUP BY p.ID, o.ID";
		
		$results = mysql_query($sql);
		
		//mysql_close($con);
		closeConnection();
		
		return $results;
	}

?>