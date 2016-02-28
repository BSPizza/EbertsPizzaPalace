<?php 	
	
	
	//returns an array of all subcategories formated like this 'SuperCategory-SubCategory'
	function getSubCategoriesWithSuperCategories()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT CONCAT_WS('-',super.Name, sub.Name) AS 'Name',sub.ID FROM Categories sub INNER JOIN Categories super ON sub.SUperCategoryID = super.ID WHERE sub.SuperCategoryID != 0 AND sub.IsDeleted = 0 AND super.IsDeleted =0";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray,array($row["ID"],  htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	//returns an array of all menues formated like this 'SuperCategory-SubCategory-Menue'
	function getMenuesWithCategories()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT CONCAT_WS('-',super.Name, sub.Name, m.Name) AS 'Name',m.ID FROM Menues m INNER JOIN Categories sub ON m.CategoryID=sub.ID INNER JOIN Categories super ON sub.SUperCategoryID = super.ID WHERE sub.SuperCategoryID != 0 AND sub.IsDeleted = 0 AND super.IsDeleted =0 AND m.IsDeleted=0";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray, array($row["ID"], htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	//returns an array of all products formated like this 'SuperCategory-SubCategory-Product'
	function getProductsWithCategories()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT CONCAT_WS('-',super.Name, sub.Name, p.Name) AS 'Name',p.ID FROM Products p INNER JOIN Categories sub ON p.CategoryID=sub.ID INNER JOIN Categories super ON sub.SUperCategoryID = super.ID WHERE sub.SuperCategoryID != 0 AND sub.IsDeleted = 0 AND super.IsDeleted =0 AND p.IsDeleted =0";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray, array($row["ID"], htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getIngredients()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT i.Name, i.ID FROM Ingredients i WHERE i.IsDeleted=0;";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray, array($row["ID"], htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}	

	function getDiscounts()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT Name, ID FROM Discounts WHERE IsDeleted=0;";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray, array($row["ID"], htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}

	function getCategoriesWithSuperCategories()
	{
		$retArray = array();
		createConnection();
		
		//create statement
		$statement = "SELECT Name, ID FROM Categories WHERE IsDeleted = 0 AND SuperCategoryID=0 UNION SELECT CONCAT_WS('-', super.Name, sub.Name)AS 'Name', sub.ID FROM Categories sub RIGHT JOIN Categories super ON sub.SuperCategoryID = super.ID WHERE sub.IsDeleted=0;";
		//query db
		$result =  mysql_query($statement);
		
	
	
		//if there are any results fill retArray
		if($result)
		{
			//add all results to retArray
			while($row = mysql_fetch_array($result))
			{
				array_push($retArray, array($row["ID"], htmlentities($row["Name"])));
			}		
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	
	
	function saveNewMenue($name, $categoryID, $discount, $productArray)
	{
		$debug = false;
		$tmpArray = array();
		createConnection();
		
		if($debug) echo"create statement<br/>";
		$statement = "INSERT INTO Menues(Name, Discount, CategoryID, IsDeleted) VALUES ('".$name."',".$discount.",".$categoryID.",0);";
		//$statement = "INSERT INTO Menues(Name, Discount, CategoryID, IsDeleted) VALUES ('Pizza Party',40,10,0);";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		$statement = "SELECT LAST_INSERT_ID() AS 'ID';";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		
		if($result)
		{
			if($debug) echo"fetch results for row<br/>";
			$row = mysql_fetch_array($result);
			if($debug) echo"fetched: ".$row."<br/>";
			$newID = $row["ID"]; //fetch id from newly created item
			if($debug) echo"new id is".$newID."<br/>";
			if($debug) echo"start going through array of product ids:".$productArray."<br/>";
			foreach($productArray as $id)
			{
				if($debug) echo"creating link for ".$id."<br/>";
				//is id
				if(is_numeric($id))
				{
					if($debug) echo"create statement<br/>";
					$statement = "INSERT INTO xMenueProduct(MenueID, ProductID, Amount, IsDeleted) VALUES(".$newID.",".$id.",1,0);";
					if($debug) echo"statement created, query db<br/>";
					$result = mysql_query($statement);
					if($debug) echo"db queried result:".$result."<br/>";
				}
				else
				{
					if($debug) echo"is no id<br/>";
				}
				
			}
		}
		
		
		closeConnection();
	}
	
	function delMenueItem($itemID)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to delete menues entry<br/>";
		$statement = "UPDATE Menues SET IsDeleted=1, DeleteDate=NOW() WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		if($debug) echo"create statement to delete xmenueproduct entries<br/>";
		$statement = "UPDATE xMenueProduct SET IsDeleted=1,DeleteDate=NOW() WHERE MenueID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		
		
		closeConnection();
	}
	
	function changeExistingMenue($itemID, $newName, $categoryID, $discount, $productArray)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to mark all not already as deleted marked crosstable entries as deleted with current date";
		$statement="UPDATE xMenueProduct SET IsDeleted=1, DeleteDate=NOW() WHERE MenueID=".$itemID." AND IsDeleted=0;";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		if($debug) echo"create statement to change attributes of selected menue<br/>";
		$statement = "UPDATE Menues SET Name='".$newName."', Discount=".$discount.", CategoryID=".$categoryID." WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		if($debug) echo"create statements to generate new entries in the crosstable<br/>";
		if($debug) echo"start going through array of product ids:".$productArray."<br/>";
		foreach($productArray as $id)
		{
			if($debug) echo"creating link for ".$id."<br/>";
			//is id
			if(is_numeric($id))
			{
				if($debug) echo"create new statement<br/>";
				$statement = "INSERT INTO xMenueProduct(MenueID, ProductID, Amount, IsDeleted) VALUES(".$itemID.",".$id.",1,0);";
				if($debug) echo"statement created, query db<br/>";
				$result = mysql_query($statement);
				if($debug) echo"db queried result:".$result."<br/>";
			}
			else
			{
				if($debug) echo"is no id<br/>";
			}
			
		}
			
		closeConnection();
	}

	


	function saveNewProduct($name, $energyVal, $price, $category, $ingredientArray)
	{
		$debug = false;
		$tmpArray = array();
		createConnection();
		$price = str_replace(",",".",$price);
		if($debug) echo"create statement<br/>";
		$statement = "INSERT INTO Products(Name, EnergyValue, Price, CategoryID, IsDeleted) VALUES ('".$name."',".$energyVal.",".$price.",".$category.",0);";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried, result:".$result."<br/>";
		$statement = "SELECT LAST_INSERT_ID() AS 'ID';";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		
		if($result)
		{
			if($debug) echo"fetch results for row<br/>";
			$row = mysql_fetch_array($result);
			if($debug) echo"fetched: ".$row."<br/>";
			$newID = $row["ID"]; //fetch id from newly created item
			if($debug) echo"new id is".$newID."<br/>";
			if($debug) echo"start going through array of ingredient ids:".$ingredientArray."<br/>";
			foreach($ingredientArray as $id)
			{
				if($debug) echo"creating link for ".$id."<br/>";
				//is id
				if(is_numeric($id))
				{
					if($debug) echo"create statement<br/>";
					$statement = "INSERT INTO xProductIngredient(ProductID,IngredientID, IsDeleted) VALUES(".$newID.",".$id.",0);";
					if($debug) echo"statement created, query db<br/>";
					$result = mysql_query($statement);
					if($debug) echo"db queried result:".$result."<br/>";
				}
				else
				{
					if($debug) echo"is no id<br/>";
				}
				
			}
		}
		
		
		closeConnection();
	}
	
	function delProductItem($itemID)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to delete menues entry<br/>";
		$statement = "UPDATE Products SET IsDeleted=1, DeleteDate=NOW() WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		if($debug) echo"create statement to delete xmenueproduct entries<br/>";
		$statement = "UPDATE xProductIngredient SET IsDeleted=1,DeleteDate=NOW() WHERE ProductID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		closeConnection();
	}
	
	function changeExistingProduct($itemID, $name, $energyVal, $price, $category, $ingredientArray)
	{
		$debug = false;
		if($debug) echo"parameter: itemID=".$itemID.",name=".$name.",energyVal=".$energyVal.",price=".$price.",category=".$category.",ingredientArray=".$ingredientArray."<br/>";
		
		if($debug) echo "changed ".$price;
		$price = str_replace(",",".",$price);
		if($debug) echo "to ".$price."<br/>";
		createConnection();
		
		if($debug) echo"create statement to mark all not already as deleted marked crosstable entries as deleted with current date";
		$statement="UPDATE xProductIngredient SET IsDeleted=1, DeleteDate=NOW() WHERE ProductID=".$itemID." AND IsDeleted=0;";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		if($debug) echo"create statement to change attributes of selected menue<br/>";
		$statement = "UPDATE Products SET Name='".$name."', EnergyValue=".$energyVal.", Price=".$price.", CategoryID=".$category." WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
		
		if($debug) echo"create statements to generate new entries in the crosstable<br/>";
		if($debug) echo"start going through array of product ids:".$ingredientArray."<br/>";
		foreach($ingredientArray as $id)
		{
			if($debug) echo"creating link for ".$id."<br/>";
			//is id
			if(is_numeric($id))
			{
				if($debug) echo"create new statement<br/>";
				$statement = "INSERT INTO xProductIngredient(ProductID, IngredientID, IsDeleted) VALUES(".$itemID.",".$id.",0);";
				if($debug) echo"statement created, query db<br/>";
				$result = mysql_query($statement);
				if($debug) echo"db queried result:".$result."<br/>";
			}
			else
			{
				if($debug) echo"is no id<br/>";
			}
			
		}
			
		closeConnection();
	}
	
	
	
	
	function saveNewIngredient($name)
	{
		$debug = false;
		$tmpArray = array();
		createConnection();
		
		if($debug) echo"create statement<br/>";
		$statement = "INSERT INTO Ingredients(Name, IsDeleted) VALUES ('".$name."',0);";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);

		closeConnection();
	}
	
	function delIngredientItem($itemID)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to delete menues entry<br/>";
		$statement = "UPDATE Ingredients SET IsDeleted=1, DeleteDate=NOW() WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		if($debug) echo"create statement to delete xproductingredient entries<br/>";
		$statement = "UPDATE xProductIngredient SET IsDeleted=1,DeleteDate=NOW() WHERE IngredientID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		closeConnection();
	}
	
	function changeExistingIngredient($itemID, $name)
	{
		$debug = false;		
		createConnection();
				
		if($debug) echo"create statement to change attributes of selected ingredient<br/>";
		$statement = "UPDATE Ingredients SET Name='".$name."' WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
				
			
		closeConnection();
	}

	
	
	
	function saveNewDiscount($name, $begin, $end, $discount)
	{		
		$debug = false;
		if($debug) echo"parameter: name=".$name.",begin=".$begin.",end=".$end.",discount=".$discount."<br/>";
		
		if($debug) echo "changed ".$discount;
		$discount = str_replace(",",".",$discount);
		if($debug) echo "to ".$discount."<br/>";
		
		createConnection();
		if($debug) echo"create statement<br/>";
		$statement = "INSERT INTO Discounts(Name, Begin, End, Discount, IsDeleted) VALUES ('".$name."','".$begin."','".$end."',".$discount.",0 );";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result".$result."<br/>";
		closeConnection();
	}
	
	function delDiscountItem($itemID)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to delete discount entry<br/>";
		$statement = "UPDATE Discounts SET IsDeleted=1, DeleteDate=NOW() WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		closeConnection();
	}
	
	function changeExistingDiscount($itemID,$name,$begin,$end,$discount)
	{
		$debug = false;
		if($debug) echo"parameter: itemID=".$itemID.",name=".$name.",begin=".$begin.",end=".$end.",discount=".$discount."<br/>";
		
		if($debug) echo "changed ".$discount;
		$discount = str_replace(",",".",$discount);
		if($debug) echo "to ".$discount."<br/>";
		
		createConnection();
		
		if($debug) echo"create statement to change attributes of selected discount<br/>";
		$statement = "UPDATE Discounts SET Name='".$name."', Begin='".$begin."', End='".$end."', Discount=".$discount." WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result:".$result."<br/>";
			
		closeConnection();
	}
	



	function saveNewCategory($name, $superCategoryID)
	{		
		$debug = false;
		if($debug) echo"parameter: name=".$name.",superCategoryID=".$superCategoryID."<br/>";
		
		createConnection();
		if($debug) echo"create statement<br/>";
		$statement = "INSERT INTO Categories(Name, SuperCategory, IsDeleted) VALUES ('".$name."',".superCategoryID.",0; );";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried result".$result."<br/>";
		closeConnection();
	}
	
	function delCategoryItem($itemID)
	{
		$debug = false;
		createConnection();
		
		if($debug) echo"create statement to delete discount entry<br/>";
		$statement = "UPDATE Categories SET IsDeleted=1, DeleteDate=NOW() WHERE ID = ".$itemID.";";
		if($debug) echo"statement created, query db<br/>";
		$result = mysql_query($statement);
		if($debug) echo"db queried. result:".$result."<br/>";
		
		closeConnection();
	}
	
	function changeExistingCategory($name, $superCategoryID)
	{

	}
	
	
	
	function getTopProductsOfMonth($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT p.Name, SUM(po.Amount) AS 'Count' FROM xProductOrder po INNER JOIN Orders o ON po.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Products p ON po.ProductID = p.ID WHERE MONTH(o.Date) = MONTH(NOW()) GROUP BY po.ProductID ORDER BY COUNT(po.ProductID) DESC LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getTopProductsOfYear($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT p.Name, SUM(po.Amount) AS 'Count' FROM xProductOrder po INNER JOIN Orders o ON po.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Products p ON po.ProductID = p.ID WHERE YEAR(o.Date) = YEAR(NOW()) GROUP BY po.ProductID ORDER BY COUNT(po.ProductID) DESC LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getTopProducts($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT p.Name, SUM(po.Amount) AS 'Count' FROM xProductOrder po INNER JOIN Orders o ON po.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Products p ON po.ProductID = p.ID GROUP BY po.ProductID ORDER BY COUNT(po.ProductID) DESC LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getTopMenuesOfMonth($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT m.Name, SUM(mo.Amount) AS 'Count' FROM xMenueOrder mo INNER JOIN Orders o ON mo.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Menues m ON mo.MenueID = m.ID WHERE MONTH(o.Date) = MONTH(NOW()) GROUP BY mo.MenueID ORDER BY COUNT(mo.MenueID) LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getTopMenuesOfYear($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT m.Name, SUM(mo.Amount) AS 'Count' FROM xMenueOrder mo INNER JOIN Orders o ON mo.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Menues m ON mo.MenueID = m.ID WHERE YEAR(o.Date) = YEAR(NOW()) GROUP BY mo.MenueID ORDER BY COUNT(mo.MenueID) LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	function getTopMenues($limit)
	{
		$retArray = array();
		createConnection();
		
		$statement = "SELECT m.Name, SUM(mo.Amount) AS 'Count' FROM xMenueOrder mo INNER JOIN Orders o ON mo.OrderID = o.ID INNER JOIN Invoices i ON o.ID = i.OrderID INNER JOIN Menues m ON mo.MenueID = m.ID GROUP BY mo.MenueID ORDER BY COUNT(mo.MenueID) LIMIT ".$limit.";";
		$result = mysql_query($statement);
		
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array($row["Name"], htmlentities($row["Count"])));
		}
		
		closeConnection();
		
		return $retArray;
	}
	
	?>