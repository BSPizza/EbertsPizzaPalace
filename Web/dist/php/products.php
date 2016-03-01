<?php

	function ladeSuperKategorien($ID){
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		
		$sql = "SELECT Name, ID FROM Categories WHERE SuperCategoryID = '$ID'";
		
		$results = mysql_query($sql);
		
		//if there are any results fill retArray
		$retArray = array();
		if($results)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($results))
			{
				array_push($retArray, array( "ID"=>$row["ID"], "Name"=>htmlentities($row["Name"])));
			}		
		}
		
		//mysql_close($con);
		closeConnection();
	
		return $retArray;
	}
	
	function ladeInhalt($ID){
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		createConnection();
		
		$sql = "SELECT p.Name, GROUP_CONCAT(i.Name) AS Zutaten, p.Price, p.ID
				FROM Products p
                INNER JOIN Categories c ON p.CategoryID = c.ID
                LEFT JOIN xProductIngredient xpi ON p.ID = xpi.ProductID
                LEFT JOIN Ingredients i ON xpi.IngredientID = i.ID
                WHERE p.IsDeleted = 0
				AND p.CategoryID = ".$ID."
				GROUP BY p.ID";
		
		
		$results = mysql_query($sql);
		
		$retArray = array();
		if($results)
		{
			while($row = mysql_fetch_array($results))
			{
				array_push($retArray, array("Name"=>htmlentities($row["Name"]), "Zutaten" =>htmlentities($row["Zutaten"]),"Price"=>htmlentities($row["Price"]), "ID"=>htmlentities($row["ID"])));
			}
		}

		//mysql_close($con);
		closeConnection();
	
		return $retArray;
	
	
	}

?>